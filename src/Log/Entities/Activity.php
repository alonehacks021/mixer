<?php 

namespace Nahad\Foundation\Log\Entities;

use Nahad\Foundation\Log\Models\Log;

class Activity {
    private ?int $userId;
    private int $typeId;
    private ?string $message;
    private array $trace;
    private array $data;
    private ?string $path;

    public function __construct($typeId) {
        $this->typeId = $typeId;
        $this->message = null;
        $this->userId = null;
        $this->data = [];
        $this->trace = [];
    }

    public function byUser($user) {
        $this->userId = $user?->id;

        return $this;
    }

    public function withData($data) {
        $this->data = [
            ...$this->data,
            ...$data,
        ];

        return $this;
    }

    public function setMessage(string $message): self {
        $this->message = $message;
        
        return $this;
    }

    public function setTrace(array $trace): self {
        $this->trace = $trace;
        
        return $this;
    }

    public function setPath(string $path): self {
        $this->path = $path;

        return $this;
    }

    public function log() {
        $log = Log::create([
            'user_id' => ($this->userId ?? auth()->id()),
            'type_id' => $this->typeId,
            'path' => ($this->path ?? request()->path()),
            'method' => request()->method(),
            'data' => $this->data,
            'ip' => request()->ip(),
            'user_agent' => (request()->header('User-Agent') ?? 'UNKNOWN'),
            'logged_at' => now()->toDateTimeString()
        ]);

        if($this->message) {
            $log->message()->create([
                'log_id' => $log->id,
                'content' => $this->message,
                'trace' => $this->trace,
            ]);
        }

        return $log;
    }
}
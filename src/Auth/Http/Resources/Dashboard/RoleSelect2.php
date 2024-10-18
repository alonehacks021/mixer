<?php

namespace Nahad\Foundation\Auth\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleSelect2 extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->name
        ];
    }
}

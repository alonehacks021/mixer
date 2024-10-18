<?php

namespace Nahad\Foundation\Auth\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class UserSelect2 extends JsonResource
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
            'text' => $this->first_name . ' ' . $this->last_name . ' (' . $this->username . ')',
            'thumbnail_url' => $this->when(request()->boolean('with_thumbnail'), $this->thumbnail_url),
        ];
    }
}

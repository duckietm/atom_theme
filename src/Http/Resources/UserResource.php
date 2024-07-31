<?php

namespace Atom\Theme\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'credits' => $this->credits,
            'background' => $this->home_background ?: asset('images/home-bg.gif'),
            'look' => $this->look,
            'editable' => $request->user()->is($this->resource),
        ];
    }
}
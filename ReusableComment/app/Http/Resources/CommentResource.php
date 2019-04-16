<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'parent_id' => $this->parent_id,
            'child' => !is_null($this->parent_id),
            'user' => new UserResource($this->user),
            'children' => CommentResource::collection($this->whenLoaded('children')),
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}

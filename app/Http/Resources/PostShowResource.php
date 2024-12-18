<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PostShowResource extends JsonResource
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
            'title'=> $this->title,
            'description'=> $this->description,
            'username'=> $this->user->username,
            'slug'=>$this->slug,
            'url'=>$this->url,
            'votes'=>$this->votes,
            'owner'=>Auth::id() == $this->user_id ? true : false,
            'comments'=>CommentResource::collection($this->whenLoaded('comments')),
            'postVotes'=> $this->whenLoaded('postVotes'),
            'created_at'=> $this->created_at->diffForHumans(),
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessagesResource extends JsonResource
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
            'sender_id' => $this->sender_id,
            'recipient_id' => $this->recipient_id,
            'body' => $this->body,
            'time' => $this->created_at
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecentResource extends JsonResource
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
            'view_date' => $this->view_date,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'last_viewed_at' => $this->last_viewed_at,
        ];
    }
}

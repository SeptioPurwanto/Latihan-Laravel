<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => (float) $this->price,
            'stock'       => (int) $this->stock,
            'image_url'   => $this->image ? asset('storage/' . $this->image) : null,
            'category'    => new CategoryResource($this->whenLoaded('category')),
            'created_at'  => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
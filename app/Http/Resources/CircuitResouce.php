<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use function PHPUnit\Framework\returnSelf;

class CircuitResouce extends BaseResource
{
    protected $attributes = [
        'name',
        'alternative',
        'description',
        'audio',
        'headpoint',
        'zoom',
    ];

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            ...parent::toArray($request),
            'path' => PathResource::collection($this->resource->paths),
            'images' => $this->resource->images->map(fn ($danon) => $danon->path)
        ];
    }
}

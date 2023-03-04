<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    private array $pagination;

    public function __construct($resource)
    {
        $this->pagination = [
            'total' => $resource->total(),
            'count' => $resource->count(),
            'per_page' => $resource->perPage(),
            'current_page' => $resource->currentPage(),
            'total_pages' => $resource->lastPage(),
        ];

        $resource = $resource->getCollection();

        parent::__construct($resource);
    }


    /**
     * Transform the resource collection into an array.
     * @param  Request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'rows' => UserResource::collection($this->collection),
            'pagination' => $this->pagination
        ];
    }
}

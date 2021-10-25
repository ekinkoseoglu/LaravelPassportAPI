<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [ // "$this" defines the "$request" parameter.
            'id' => (string)$this->id, // id yi biz tanımladık ($author->id)
            'type' => 'Authors', // 
            'attributes' => [ // 
                'name' => $this->name, // $request->name ($author->name)
                'created_at' => $this->created_at, // $request->created_at ($author->created_at)
                'updated_at' => $this->updated_at // $request->updated_at ($author->updated_at)
            ]
        ];
    }
}

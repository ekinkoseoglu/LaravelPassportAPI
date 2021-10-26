<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [ // "$this" defines the "$request" parameter.
            'id' => (string)$this->id, // id yi biz tanımladık ($book->id)
            'type' => 'Books', //  
            'attributes' => [ // 
                'name' => $this->name, // $request->name ($book->name)
                'author' => $this->author,
                'description' => $this->description, // $request->description ($book->description)
                'publication_year' => $this->publictaion_year, // $request->publication_year ($book->publication_year)
                'created_at' => $this->created_at, // $request->created_at ($book->created_at)
                'updated_at' => $this->updated_at // $request->updated_at ($book->updated_at)
            ]
        ];
    }
}

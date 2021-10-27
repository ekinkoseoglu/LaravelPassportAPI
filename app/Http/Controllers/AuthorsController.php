<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorsResource;
use PharIo\Manifest\AuthorCollection;
use App\Http\Requests\AuthorsRequest;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AuthorsResource::collection(Author::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $author = Author::create([
        //     'name' => 'John Doe' // 'John Doe' isimli bir Author Model yarattık. 
        // ]);

        //      OR CREAT A AUTHOR WITH FAKE object Using FACTORY

        $faker = \Faker\Factory::create(1);
        $author = Author::create([
            'name' => $faker->name
        ]);

        return new AuthorsResource($author);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        // return $author; 

        // OR

        // return response()->json([        // JSON API Specifications
        //     'data' => [        // We can convert the data type which in the parameter as a JSON type with using "response()"
        //         'id' => $author->id, // id yi biz tanımladık
        //         'type' => 'Authors', // 
        //         'attributes' => [ // 
        //             'name' => $author->name,
        //             'created_at' => $author->created_at,
        //             'updated_at' => $author->updated_at
        //         ]
        //     ]
        // ]);
        return new AuthorsResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorsRequest $request, Author $author)
    {
        // $author->update([
        //     'name'=>'Steph'
        // ]);

        //   OR YOU CAN UPDATE NAME WITH GIVEN REQUEST

        $author->update([
            'name' => $request->input('name')
        ]);
        return new AuthorsResource($author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return response(null, 204);
    }
}

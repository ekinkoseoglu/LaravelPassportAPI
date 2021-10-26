<?php

namespace App\Http\Controllers;

use App\Http\Resources\BooksResource;
use App\Models\Book;
use Database\Factories\BookFactory;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BooksResource::collection(Book::all());
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
        // $book = Book::create([               
        //     'name' => $request->input('name'),
        //     'description' => $request->input('description'),  
        //     'publication_year' => $request->input('publication_year')
        // ]);

        //        Let's create a dummy data for now


        $faker = \Faker\Factory::create(1);

        $book = Book::create([
            'name' => $faker->name,
            'description' => $faker->sentence,
            'publication_year' => $faker->year
        ]);
        return new BooksResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //  return $book->author; // Just about Eloquent Relationships 
        return new BooksResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update([
            'name' => $request->input('name'),
            // 'description' => $request->input('description'),
            // 'publication_year' => $request->input('publication_year')

            // When I define those too, it makes them they are required
        ]);



        return new BooksResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response(null, 204);
    }
}

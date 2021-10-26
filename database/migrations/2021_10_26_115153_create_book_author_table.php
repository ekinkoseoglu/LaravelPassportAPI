<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_author', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id');   // Declaring "author_id" column as a Foreign keys of "authors" table
            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->cascade('delete');


            $table->unsignedBigInteger('book_id'); // Declaring "book_id" column as a Foreign keys of "books" table
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->cascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_author');
    }
}

<?php

use App\Models\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Book::query()->update(['author' => null]);

        Schema::table('books', function (Blueprint $table){
            $table->renameColumn('author', 'author_id');
        });

        Schema::table('books', function (Blueprint $table){
            $table->integer('author_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('author_id', 150)->change();
            $table->renameColumn('author_id', 'author');
        });
    }
};

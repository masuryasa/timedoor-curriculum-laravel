<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::paginate(15);

        return view('index', ['books' => $books]);
    }

    public function show($id) {
        //
    }

    public function create() {
        return view('create');
    }

    public function store(StoreBookRequest $request) {
        // $book = Book::crea
        $book = new Book;
        $book->create($request->all());

        return redirect()->route('books.index');
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}

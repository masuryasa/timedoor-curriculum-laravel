<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = Book::paginate(15);

        return view('index', ['books' => $books]);
    }

    public function show($id) {
        $book = Book::findOrFail($id);

        return view('show', ['book' => $book]);
    }

    public function create() {
        return view('create');
    }

    public function store(StoreBookRequest $request) {
        $book = new Book;
        $book->create($request->all());

        return redirect()->route('books.index');
    }

    public function edit($id) {
        $book = Book::findOrFail($id);
        $book->publish_date = Carbon::createFromFormat('Y-m-d H:i:s', $book->publish_date)->format('Y-m-d');

        return view('edit', ['book' => $book]);
    }

    public function update(Request $request, $id) {
        $book = Book::findOrFail($id);

        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->category = $request->category;
        $book->pages = $request->pages;
        $book->language = $request->language;
        $book->publish_date = $request->publish_date;
        $book->subjects = $request->subjects;
        $book->image_path = $request->image_path;
        $book->desc = $request->desc;
        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }
}

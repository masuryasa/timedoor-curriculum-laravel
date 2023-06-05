<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Author;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\ErrorHandler\Throwing;
use Throwable;

class BookController extends Controller
{
    public function index(SearchRequest $request) {
        $books = Book::paginate(15);

        if ($request->has('search')) {
            $keyword = $request->search;

            $books = Book::where('isbn', 'LIKE', "%$keyword%")
            ->orWhere('title', 'LIKE', "%$keyword%")
            ->orWhere('author', 'LIKE', "%$keyword%")
            ->orWhere('publisher', 'LIKE', "%$keyword%")
            ->orWhere('category', 'LIKE', "%$keyword%")
            ->orWhere('subjects', 'LIKE', "%$keyword%")
            ->orWhere('desc', 'LIKE', "%$keyword%")
            ->paginate(15)
            ->appends(['search' => $keyword]);
        }

        return view('index', ['books' => $books]);
    }

    public function show(Book $book) {
        $book->with('author');

        return view('show', ['book' => $book]);
    }

    public function create() {
        return view('create', ['authors' => Author::all()]);
    }

    public function store(BookRequest $request) {
        try {
            $book = new Book;
            $newData = array_merge($request->all(), ['user_id' => Auth::user()->id]);
            $book->create($newData);

            return redirect()->route('books.index')->with('status', ['success', 'Data berhasil tersimpan']);
        } catch (\Throwable $th) {
            return redirect()->route('books.index')->with('status', ['danger', 'Data gagal tersimpan']);
        }
    }

    public function edit(Book $book) {
        $book->publish_date = Carbon::createFromFormat('Y-m-d H:i:s', $book->publish_date)->format('Y-m-d');

        return view('edit', ['book' => $book, 'authors' => Author::all()]);
    }

    public function update(BookRequest $request, Book $book) {
        try {
            $book->isbn = $request->isbn;
            $book->title = $request->title;
            $book->author_id = $request->author_id;
            $book->publisher = $request->publisher;
            $book->category = $request->category;
            $book->pages = $request->pages;
            $book->language = $request->language;
            $book->publish_date = $request->publish_date;
            $book->subjects = $request->subjects;
            $book->image_path = $request->image_path;
            $book->desc = $request->desc;
            $book->save();

            return redirect()->route('books.index')->with('status', ['success', 'Data berhasil diperbarui']);
        } catch (\Throwable $th) {
            return redirect()->route('books.index')->with('status', ['danger', 'Data gagal diperbarui']);
        }
    }

    public function destroy(Book $book) {
        try {
            $book->delete();

            return redirect()->route('books.index')->with('status', ['success', 'Data berhasil dihapus']);
        } catch (\Throwable $th) {
            return redirect()->route('books.index')->with('status', ['danger', 'Data gagal dihapus']);
        }
    }
}

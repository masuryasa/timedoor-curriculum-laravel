<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(SearchRequest $request)
    {
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

        return response()->json([
            'status' => 'success',
            'message' => 'Success to get data',
            'data' => $books
        ]);
    }

    public function store(BookRequest $request)
    {
        try {
            $book = new Book;
            $newData = array_merge($request->all(), ['user_id' => Auth::user()->id]);
            $book->create($newData);

            return response()->json([
                'status' => 'success',
                'message' => 'Success to save data',
                'data' => $book
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to save data',
                'error_code' => 500
            ]);
        }
    }

    public function show($id)
    {
            $book = Book::with('author')->find($id);

            if (! $book) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data not found',
                    'error_code' => 404
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Success to show data',
                'data' => $book
            ]);
    }

    public function update(BookRequest $request, $id)
    {
        try {
            $book = Book::find($id);

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

            return response()->json([
                'status' => 'success',
                'message' => 'Success to update data',
                'data' => $book
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update data',
                'error_code' => 500
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $book = Book::find($id);
            $book->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Success to update data',
                'status_code' => 204
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete data',
                'error_code' => 404
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

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
        //
    }

    public function store(Request $request) {
        //
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

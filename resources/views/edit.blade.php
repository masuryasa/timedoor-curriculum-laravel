@extends('layout')

@section('title', 'Create')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 thumbnail">
            <div class="row text-center">
                <h2 class="pt-50 pb-50">Update Book's Data</h2>
                <div class="col-sm-9 col-md-6 form-center">
                    <form class="form-horizontal text-center" action="{{ route('books.update', ['id' => $book->id]) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="isbn">ISBN</label>
                            <div class="col-md-8">
                                <input type="text" name="isbn" class="form-control" id="isbn" value="{{ $book->isbn }}">
                                @error('isbn'){{ $message }}@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="title">Title</label>
                            <div class="col-md-8">
                                <input type="string" name="title" class="form-control" id="title" value="{{ $book->title }}">
                                @error('title'){{ $message }}@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="author">Author</label>
                            <div class="col-md-8">
                                <input type="string" name="author" class="form-control" id="author" value="{{ $book->author }}">
                                @error('author'){{ $message }}@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="publisher">Publisher</label>
                            <div class="col-md-8">
                                <input type="string" name="publisher" class="form-control" id="publisher" value="{{ $book->publisher }}">
                                @error('publisher'){{ $message }}@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="category">Category</label>
                            <div class="col-md-8">
                                <select name="category" id="category" class="form-control">
                                    <option value="fantasy" @if ($book->category == 'fantasy') selected @endif>Fantasy</option>
                                    <option value="fiction" @if ($book->category == 'fiction') selected @endif>Fiction</option>
                                    <option value="biography" @if ($book->category == 'biography') selected @endif>Biography</option>
                                    <option value="horor" @if ($book->category == 'horor') selected @endif>Horor</option>
                                    <option value="history" @if ($book->category == 'history') selected @endif>History</option>
                                </select>
                                @error('category'){{ $message }}@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="pages">Pages</label>
                            <div class="col-md-8">
                                <input type="number" name="pages" class="form-control" id="pages" value="{{ $book->pages }}">
                                @error('pages'){{ $message }}@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="language">Language</label>
                            <div class="col-md-8">
                                <select name="language" id="language" class="form-control">
                                    <option value="english" @if ($book->language == 'english') selected @endif>English</option>
                                    <option value="indonesia" @if ($book->language == 'indonesia') selected @endif>Indonesia</option>
                                    <option value="japanesse" @if ($book->language == 'japanesse') selected @endif>Japanesse</option>
                                    <option value="german" @if ($book->language == 'german') selected @endif>German</option>
                                    <option value="french" @if ($book->language == 'french') selected @endif>French</option>
                                </select>
                                @error('language'){{ $message }}@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="publish_date">Publish Date</label>
                            <div class="col-md-8">
                                <input type="date" name="publish_date" class="form-control" id="publish_date" value="{{ $book->publish_date }}">
                                @error('publish_date'){{ $message }}@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="subjects">Subjects</label>
                            <div class="col-md-8">
                                <input type="string" name="subjects" class="form-control" id="subjects" value="{{ $book->subjects }}">
                                @error('subjects'){{ $message }}@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="image_path">Image Path</label>
                            <div class="col-md-8">
                                <textarea name="image_path" id="image_path" cols="30" rows="10" class="form-control">{{ $book->subjects }}</textarea>
                                @error('image_path'){{ $message }}@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="desc">Description</label>
                            <div class="col-md-8">
                                <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">{{ $book->subjects }}</textarea>
                                @error('desc'){{ $message }}@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-md-6 text-center">
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <button type="submit" class="btn btn-default">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


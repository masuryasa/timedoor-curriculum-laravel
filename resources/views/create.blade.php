@extends('layout')

@section('title', 'Create')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 thumbnail">
            <div class="row text-center">
                <h2 class="pt-50 pb-50">Add New Book</h2>
                <div class="col-sm-9 col-md-6 form-center">
                    <form class="form-horizontal text-center" action="{{ route('books.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="isbn">ISBN</label>
                            <div class="col-md-8">
                                <input type="text" name="isbn" class="form-control" id="isbn" value="{{ old('isbn') }}">
                                @error('isbn') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="title">Title</label>
                            <div class="col-md-8">
                                <input type="string" name="title" class="form-control" id="title" value="{{ old('title') }}">
                                @error('title') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="author_id">Author</label>
                            <div class="col-md-8">
                                <select name="author_id" id="author_id" class="form-control">
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('author_id') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="publisher">Publisher</label>
                            <div class="col-md-8">
                                <input type="string" name="publisher" class="form-control" id="publisher" value="{{ old('publisher') }}">
                                @error('publisher') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="category">Category</label>
                            <div class="col-md-8">
                                <select name="category" id="category" class="form-control">
                                    <option value="fantasy" {{ old('category') == "fantasy" ? "selected" : "" }}>Fantasy</option>
                                    <option value="fiction" {{ old('category') == "fiction" ? "selected" : "" }}>Fiction</option>
                                    <option value="biography" {{ old('category') == "biography" ? "selected" : "" }}>Biography</option>
                                    <option value="horor" {{ old('category') == "horor" ? "selected" : "" }}>Horor</option>
                                    <option value="history" {{ old('category') == "history" ? "selected" : "" }}>History</option>
                                </select>
                                @error('category') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="pages">Pages</label>
                            <div class="col-md-8">
                                <input type="number" name="pages" class="form-control" id="pages" value="{{ old('pages') }}">
                                @error('pages') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="language">Language</label>
                            <div class="col-md-8">
                                <select name="language" id="language" class="form-control">
                                    <option value="english" {{ old("language") == "english" ? "selected" : ""}}>English</option>
                                    <option value="indonesia" {{ old("language") == "indonesia" ? "selected" : ""}}>Indonesia</option>
                                    <option value="japanesse" {{ old("language") == "japanesse" ? "selected" : ""}}>Japanesse</option>
                                    <option value="german" {{ old("language") == "german" ? "selected" : ""}}>German</option>
                                    <option value="french" {{ old("language") == "french" ? "selected" : ""}}>French</option>
                                </select>
                                @error('language') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="publish_date">Publish Date</label>
                            <div class="col-md-8">
                                <input type="date" name="publish_date" class="form-control" id="publish_date" value="{{ old('publish_date') }}">
                                @error('publish_date') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="subjects">Subjects</label>
                            <div class="col-md-8">
                                <input type="string" name="subjects" class="form-control" id="subjects" value="{{ old('subjects') }}">
                                @error('subjects') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="image_path">Image Path</label>
                            <div class="col-md-8">
                                <textarea name="image_path" id="image_path" cols="30" rows="10" class="form-control">{{ old('image_path') }}</textarea>
                                @error('image_path') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="desc">Description</label>
                            <div class="col-md-8">
                                <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">{{ old('desc') }}</textarea>
                                @error('desc') {{ $message }} @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-md-6 text-center">
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                            <div class="col-sm-6 col-md-6 text-center">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


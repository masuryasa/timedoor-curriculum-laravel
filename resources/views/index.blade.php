@extends('layout')

@section('title', 'Home')

@section('content')

    <div style="align-content: right">
        <div class="row mt-20 mb-20">
            <div class="col-sm-6 col-md-2">
                <a href="{{ route('books.create') }}" class="btn btn-primary" role="button" @guest style="pointer-events: none" @endguest>Add New Book</a>
            </div>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-{{ session('status')[0] }} alert-dismissible fade in" role="alert">
            {{ session('status')[1] }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- item cards -->

    @foreach ($books->chunk(4) as $book)
        <div class="row">
            @foreach ($book as $b)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $b->image_path }}" alt="cover-of-books" width="250px">
                        <div class="caption">
                            <h3>{{ $b->title }}</h3>
                            <p>{{ $b->short_desc }}</p>
                            <div class="text-center"><a href="{{ route('books.show', ['book' => $b]) }}" class="btn btn-default" role="button">Show Detail</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection

@section('pagination')
    <!-- pagination -->
    <div class="text-center">
        {{-- add pagination bars here --}}
        @isset($books)
            <div class="d-flex">
                {!! $books->links() !!}
            </div>
        @endisset
    </div>
@endsection

@extends('layout')

@section('title', 'Home')

@section('content')
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
                            <div class="text-center"><a href="{{ route('books.show', ['id' => $b->id]) }}" class="btn btn-default" role="button">Show Detail</a></div>
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

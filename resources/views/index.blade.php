@extends('layout')

@section('title', 'Home')

@section('content')
    <!-- item cards -->

    @foreach ($books->chunk(4) as $book)
        <div class="row">
            @foreach ($book as $b)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $b['image_path'] }}" alt="cover-of-books" width="250px">
                        <div class="caption">
                            <h3>{{ $b['title'] }}</h3>
                            <p>{{ $b['short_desc'] }}</p>
                            <div class="text-center"><a href="{{ url('books/detail') }}" class="btn btn-default" role="button">Show Detail</a></div>
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
        {{-- <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav> --}}
        @isset($books)
            <div class="d-flex">
                {!! $books->links() !!}
            </div>
        @endisset
    </div>
@endsection

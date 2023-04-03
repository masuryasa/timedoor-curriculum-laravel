@extends('layout')

@section('title', 'Home')

@section('content')
    <!-- item cards -->
    @php
        $books = array_chunk($books, 4);
    @endphp

    @foreach ($books as $book)
        <div class="row">
            @foreach ($book as $b)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ $b['image'] }}" alt="cover-of-books" width="250px">
                        <div class="caption">
                            <h3>Books Title</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima quasi a quam quisquam temporibus, tenetur pariatur quod tempore reprehenderit debitis distinctio possimus voluptas sed. Error, quasi! Ex ipsam dignissimos ipsum?</p>
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
        <nav aria-label="Page navigation">
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
        </nav>
    </div>
@endsection

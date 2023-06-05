@php
    function chunkString(string $string, int $maxLength) {
        $initialText = substr($string, 0, $maxLength);
        $moreText = substr($string, $maxLength, strlen($string) - $maxLength);
        return array($initialText, $moreText);
    }
@endphp

@extends('layout')

@section('title', 'Detail')

@section('content')
    <!-- item cards -->
    <!-- first row of cards -->
    <div class="row">
        <!-- first item -->
        <div class="col-sm-12 col-md-12">
            <div class="thumbnail">
                <div class="row">
                    {{-- image of book --}}
                    <div class="col-sm-12 col-md-3">
                        <img src="{{ $book->image_path }}" alt="cover-of-books" width="250px" class="image-detail">
                    </div>

                    {{-- details of book --}}
                    <div class="col-sm-12 col-md-9">
                        <div class="caption">
                            <h2><b>{{ $book->title }}</b></h2> by <a href="#">{{ $book->author->name }}</a>
                            <br><br>
                            <p>ISBN <b>{{ $book->isbn }}</b></p>
                            <p>Publisher <b>{{ $book->publisher }}</b></p>
                            <p>Category <b>{{ $book->category }}</b></p>
                            <p>Pages <b>{{ $book->pages }}</b></p>
                            <p>Language <b>{{ $book->language }}</b></p>
                            <p>Publish Date <b>{{ $book->publish_date }}</b></p>
                            <p>Subjects <span class="subject">{{ $book->subjects }}<span></p>
                            @if ($book->desc > 500)
                                @php
                                    [$initialText, $moreText] = chunkString($book->desc, 500)
                                @endphp

                                <p>{{ $initialText }}<span id="dots">...</span><span id="more">{{ $moreText }}</span></p>
                                <p class="h-link" id="more-btn" onclick="showCompleteText()">Read more</p>
                            @else
                                <p>{{ $book->desc }}</p>
                            @endif
                        </div>
                        @auth
                            <div class="row pb-30">
                                <div class="col-md-6 col-sm-6 text-center">
                                    <a href="{{ route('books.edit', ['book' => $book]) }}" class="btn btn-warning" @if(auth()->user()->can('update-delete-book', $book)) @else style="pointer-events: none" @endif>
                                        <span class="glyphicon glyphicon-edit"></span> Edit
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 text-center">
                                    <form action="{{ route('books.destroy', ['book' => $book]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" @if(auth()->user()->can('update-delete-book', $book)) @else style="pointer-events: none" @endif>
                                            <span class="glyphicon glyphicon-trash"></span> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

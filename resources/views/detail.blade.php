@php
    function chunkString(string $string, int $maxLength) {
        $initialText = substr($string, 0, $maxLength);
        // $j = strlen($string) - $maxLength;
        $moreText = substr($string, $maxLength, strlen($string) - $maxLength);
        // return $i;
        // return substr("Hello world",0,10);
        // return array($initialText);
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
                        <img src="{{ $details['image'] }}" alt="cover-of-books" width="250px" class="image-detail">
                    </div>

                    {{-- details of book --}}
                    <div class="col-sm-12 col-md-9">
                        <div class="caption">
                            <h2><b>{{ $details['title'] }}</b></h2> by <a href="#">{{ $details['author'] }}</a>
                            <br><br>
                            <p>ISBN <b>{{ $details['isbn'] }}</b></p>
                            <p>Publisher <b>{{ $details['publisher'] }}</b></p>
                            <p>Category <b>{{ $details['category'] }}</b></p>
                            <p>Pages <b>{{ $details['pages'] }}</b></p>
                            <p>Language <b>{{ $details['language'] }}</b></p>
                            <p>Publish Date <b>{{ $details['publish_date'] }}</b></p>
                            <p>Subjects
                                @foreach ($details['subjects'] as $key=>$value)
                                    <span class="subject">{{ $value }}<span>@if ($key+1 < count($details['subjects'])),@endif
                                @endforeach

                            @if ($details['desc'] > 500)
                                @php
                                    [$initialText, $moreText] = chunkString($details['desc'], 500)
                                @endphp

                                <p>{{ $initialText }}<span id="dots">...</span><span id="more">{{ $moreText }}</span></p>
                                <span id="more-btn" onclick="showCompleteText()">Read more</span>
                            @else
                                <p>{{ $details['desc'] }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

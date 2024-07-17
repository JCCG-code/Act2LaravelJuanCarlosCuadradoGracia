@extends('layouts.app')

@section('content')
    <div class="home">
        @if (session('success'))
            <div class="success-msg">
                {{ session('success') }}
            </div>
        @endif
        <div class="books-wrap">
            @foreach ($books as $book)
            <div class="book">
                <div>
                    <p>{{ $book->title }}</p>
                </div>
                <div>
                    <p>{{ $book->author }}</p>
                    <p>{{ $book->description }}</p>
                    <p>{{ $book->published_at }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .home {
            padding: 50px;
        }
        .success-msg {
            position: fixed;
            right: 0;
            background-color: #111111;
            border-left: 2px solid #116411;
            z-index: 10;

            /* Sizes */
            padding: 10px 50px;
        }
        .books-wrap {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));

            /* Sizes */
            gap: 50px
        }
        .books-wrap .book {
            position: relative;
            background-color: #fa807260;
            box-shadow: 0 0 20px #0000007a;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;

            /* Sizes */
            padding: 10px;
            max-width: 250px;
            height: 300px;
        }
        .books-wrap .book div:nth-child(1) p {
            font-size: 25px;
        }
        .books-wrap .book div:nth-child(2) {
            align-self: flex-start;
            font-size: 14px;
        }
    </style>
@endsection

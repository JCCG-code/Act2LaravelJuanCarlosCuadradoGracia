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
                @if($book->is_available)
                <div class="book">
                    <div>
                        <p>{{ $book->title }}</p>
                    </div>
                    <div>
                        <p>{{ $book->author }}</p>
                        <p>{{ $book->description }}</p>
                        <p>
                            {{ $book->published_at }}
                            <span>
                                <a href="{{ route('editBook', $book->id) }}"><button>Edit</button></a>
                                <a href="{{ route('loans.create', $book->id) }}"><button>Loan</button></a>
                            </span>
                        </p>
                    </div>
                </div>
                @else
                <div class="book reserved">
                    <p class="is-reserved">Reserved</p>
                    <div>
                        <p>{{ $book->title }}</p>
                    </div>
                    <div>
                        <p>{{ $book->author }}</p>
                        <p>{{ $book->description }}</p>
                        <p>
                            {{ $book->published_at }}
                            <span>
                                <a href="{{ route('editBook', $book->id) }}">Edit</a>
                            </span>
                        </p>
                    </div>
                </div>
                @endif
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
        .books-wrap .reserved {
            opacity: 0.5;
        }
        .books-wrap .reserved .is-reserved {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(45deg) scale(2);
        }
        .books-wrap .book div:nth-child(1) p {
            font-size: 25px;
        }
        .books-wrap .book div:nth-child(2) {
            align-self: flex-start;
            font-size: 14px;
            width: 100%;
        }
        .books-wrap .book div:nth-child(2) p:last-child {
            display: flex;
            justify-content: space-between;
        }
        .books-wrap .book div:nth-child(2) p:last-child button {
            background-color: #dfdfdf;
            color: #111111;
            font-weight: 600;
            padding: 0px 3px;
            cursor: pointer;
        }
    </style>
@endsection

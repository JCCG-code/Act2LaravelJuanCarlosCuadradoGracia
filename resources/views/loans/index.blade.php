@extends('layouts.app')

@section('content')
    <div class="loans">
        <h1>My Loans</h1>
        <div class="loans-wrap">
            @foreach ($res as $data)
            <div class="loan">
                <div>
                    <p>{{ $data['book']->title }}</p>
                </div>
                <div>
                    <p>{{ $data['book']->author }}</p>
                    <p>Borrowed at<br>{{ $data['loan']->borrowed_at }}</p>
                    @if ($data['loan']->returned_at)
                        <p>Returned at<br>{{ $data['loan']->returned_at }}</p>
                        <form action="{{ route('loans.destroy', $data['loan']->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this loan?');">Delete</button>
                        </form>
                    @else
                        <a href="{{ route('loans.return', $data['loan']->id) }}"><button>Return back</button></a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .loans {
            /* Sizes */
            max-width: 700px;
            margin: 0 auto;
        }
        .loans h1 {
            font-size: 25px;
            font-weight: 500;

            /* Sizes */
            padding: 30px 0;
        }
        .loans-wrap {
            display: flex;
            flex-direction: column;

            /* Sizes */
            gap: 50px
        }
        .loans-wrap .loan {
            position: relative;
            background-color: #fa807260;
            box-shadow: 0 0 20px #0000007a;

            display: flex;
            flex-direction: column;

            /* Sizes */
            padding: 5px 10px;
        }
        .loans-wrap .loan div:nth-child(1) p {
            /* Sizes */
            font-size: 25px;
        }
        .loans-wrap .loan div:nth-child(2) {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 14px;

            /* Sizes */
            width: 100%;
        }
        .loans-wrap .loan button {
            font-weight: 600;
            color: #111111;
            text-align: center;
            background-color: #dfdfdf;
            cursor: pointer;

            /* Sizes */
            width: 100%;
            padding: 3px;
        }
    </style>
@endsection

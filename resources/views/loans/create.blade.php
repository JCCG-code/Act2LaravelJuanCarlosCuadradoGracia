@extends('layouts.app')

@section('content')
    <div class="new-loan">
        <h1>New loan</h1>
        <div class="book-loan">
            <p>Requesting {{ $book->title }} of {{ $book->author }} for a loan</p>
        </div>
        <form action="{{ route('newLoan') }}" method="post">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <label for="borrowed_at">Borrowed at:</label>
            <input type="datetime-local" name="borrowed_at" id="borrowed_at">
            <button type="submit">Create Loan</button>
        </form>
    </div>
@endsection

@section('styles')
    <style>
        .new-loan {
            /* Sizes */
            max-width: 700px;
            margin: 0 auto;
        }
        .new-loan h1 {
            font-size: 25px;
            font-weight: 500;

            /* Sizes */
            padding: 30px 0;
        }
        .new-loan .book-loan {
            margin-bottom: 30px;
        }
        .new-loan form {
            display: flex;
            flex-direction: column;

            /* Sizes */
            gap: 15px;
        }
        .new-loan form input {
            background-color: #111111;
            cursor: pointer;

            /* Sizes */
            padding: 10px;
        }
        .new-loan form button {
            font-weight: 600;
            color: #111111;
            text-align: center;
            background-color: #dfdfdf;

            /* Sizes */
            height: 40px;
        }
    </style>
@endsection

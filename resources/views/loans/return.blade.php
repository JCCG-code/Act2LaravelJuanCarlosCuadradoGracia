@extends('layouts.app')

@section('content')
    <div class="new-return">
        <h1>Return book</h1>
        <div class="book-loan">
            <p>Returning {{ $res['book']->title }} of {{ $res['book']->author }}</p>
        </div>
        <form action="{{ route('loans.update', $res['loan']->id) }}" method="post">
            @csrf
            @method('PUT')
            <label for="returned_at">Returned at:</label>
            <input type="datetime-local" name="returned_at" id="returned_at">
            <button type="submit">Return back</button>
        </form>
    </div>
@endsection

@section('styles')
    <style>
        .new-return {
            /* Sizes */
            max-width: 700px;
            margin: 0 auto;
        }
        .new-return h1 {
            font-size: 25px;
            font-weight: 500;

            /* Sizes */
            padding: 30px 0;
        }
        .new-return .book-loan {
            margin-bottom: 30px;
        }
        .new-return form {
            display: flex;
            flex-direction: column;

            /* Sizes */
            gap: 15px;
        }
        .new-return form input {
            background-color: #111111;
            cursor: pointer;

            /* Sizes */
            padding: 10px;
        }
        .new-return form button {
            font-weight: 600;
            color: #111111;
            text-align: center;
            background-color: #dfdfdf;

            /* Sizes */
            height: 40px;
        }
    </style>
@endsection

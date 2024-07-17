@extends('layouts.app')

@section('content')
    <div class="new-book">
        <h1>Updating a book</h1>
        {{-- Form --}}
        <form action="{{ route('editBook', $book->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="title" id="title" placeholder="Title" required>
            <input type="text" name="author" id="author" placeholder="Author" required>
            <input type="text" name="description" id="description" placeholder="Description" required>
            <input type="date" name="published_at" id="published_at" required>
            <button type="submit">Update</button>
        </form>
    </div>
@endsection

@section('styles')
    <style>
        .new-book {
            /* Sizes */
            max-width: 700px;
            margin: 0 auto;
        }
        .new-book h1 {
            font-size: 25px;
            font-weight: 500;

            /* Sizes */
            padding: 30px 0;
        }
        .new-book form {
            display: flex;
            flex-direction: column;

            /* Sizes */
            gap: 15px;
        }
        .new-book form input {
            background-color: #111111;
            cursor: pointer;

            /* Sizes */
            padding: 10px;
        }
        .new-book form input::placeholder {
            opacity: 0.5;
        }
        .new-book form input:focus {
            opacity: 1;
            outline: 1px solid salmon;
        }
        .new-book form button {
            font-weight: 600;
            color: #111111;
            text-align: center;
            background-color: #dfdfdf;

            /* Sizes */
            height: 40px;
        }
    </style>
@endsection

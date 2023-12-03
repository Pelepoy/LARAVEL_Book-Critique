@extends('layouts.app')

@section('content')
    <h1 class='mb-10 text-2xl'>Add Review for {{ $book->title }}</h1>

    <form action="{{ route('books.reviews.store', $book) }}" method="POST">
        @csrf

        <label for="review">Review</label>
        <textarea name="review" id="review" required
            class="input mb-4 @error('review') border-red-500 transition duration-400 ease-in-out @enderror"></textarea>
        @error('review')
            <span class="text-red-600 text-xs" role="alert"> {{ $message }} </span>
        @enderror
        
        <label for="rating"></label>
        <select name="rating" id="rating" required class="input mb-4">
            <option value="" disabled selected>Select a rating</option>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>

        <button type="submit" class="btn">Add Review</button>
    </form>
@endsection

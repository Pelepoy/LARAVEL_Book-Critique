@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h1 class="mb-2 text-2xl font-extrabold">{{ $book->title }}</h1>

        <div class="book-info">
            <div class="book-author mb-4 text-lg font-semibold">by {{ $book->author }}</div>
            <div class="book-rating flex items-center">
                <div class="mr-2 text-sm font-medium text-slate-700">
                    {{ number_format($book->reviews_avg_rating, 1) }}
                    <x-star-rating :rating="$book->reviews_avg_rating" />
                </div>
                <span class="book-review-count text-sm text-gray-500">
                    {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                </span>
            </div>
        </div>
    </div>

    {{-- <div class="mb-4">
    <a href="{{ route('books.reviews.create', $book)}}" class="reset-link">Add a review</a>
  </div> --}}
    <div class="mb-4">
        @auth
            @if ($book->user_id === auth()->user()->id)
                <a href="{{ route('books.edit', $book)}}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded h-10">Edit Book</a>
                <form action="{{ route('books.destroy', $book)}}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded h-10">Delete Book</button>
                </form>
            @else
                <a href="{{ route('books.reviews.create', $book) }}" class="reset-link">Add a review</a>
            @endif
        @endauth

        @guest
            <a href="{{ route('books.reviews.create', $book) }}" class="reset-link">Add a review</a>
        @endguest
    </div>
    <div>
        <h2 class="mb-4 text-xl font-semibold">Reviews</h2>
        <ul>
            @forelse ($book->reviews as $review)
                <li class="book-item mb-4">
                    <div>
                        <div class="mb-2 flex items-center justify-between">
                            <div class="font-semibold">
                                <x-star-rating :rating="$review->rating" />
                            </div>
                            <div class="book-review-count">
                                {{ $review->created_at->format('M j, Y') }}</div>
                        </div>
                        <p class="text-gray-700">{{ $review->review }}</p>
                    </div>
                </li>
            @empty
                <li class="mb-4">
                    <div class="empty-book-item">
                        <p class="empty-text text-lg font-semibold">No reviews yet</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
@endsection

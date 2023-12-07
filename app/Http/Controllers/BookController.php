<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->input('title');
        $filter = $request->input('filter', '');

        $books = Book::when(
            $title,
            fn ($query, $title) =>
            $query->title($title)
        );
        $books = match ($filter) {
            'popular_last_month'         =>    $books->popularLastMonth(),
            'popular_last_6months'       =>    $books->popularLast6Months(),
            'highest_rated_last_month'   =>    $books->highestRatedLastMonth(),
            'highest_rated_last_6months' =>    $books->highestRated6LastMonths(),
            default                      =>    $books->latest()->withAvgRating()->withReviewsCount(),
        };
        // $books = $books->get();

        $cacheKey = 'books:' . $filter . ':' . $title;
        $books =
            cache()->remember(
                $cacheKey,
                3600,
                fn () =>
                $books->get()
            );

        return view('books.index', [
            'books' => $books,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create a new book | Book Critique';

        return view('books.create', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        dd($request);
        $validated = $request->validate([
            'title' => 'required|min:3|max:255|',
            'author' => 'required|min:3|max:255|regex:/^[a-zA-Z\s]+$/',
        ]);

        $user->books()->create($validated);

        return to_route('books.index')->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id) // route model binding
    {
        $cacheKey = 'book:' . $id;

        $book = cache()->remember(
            $cacheKey,
            3600,
            fn () => Book::with([
                'reviews' => fn ($query) => $query->latest()
            ])->withAvgRating()->withReviewsCount()->findOrFail($id)
        );

        return view('books.show', [
            'book' => $book,
        ]);

        // return view(
        //     'books.show',
        //     [
        //         'book' => $book->load([
        //             'reviews' => fn ($query) => $query->latest()
        //         ])
        //     ]
        // );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

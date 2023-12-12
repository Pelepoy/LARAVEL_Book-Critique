<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Book $book)
    {
        return view('books.reviews.create', [
            'book' => $book
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {

        $validated = $request->validate([
            'review' => 'required|min:15',
            'rating' => 'required|numeric|between:1,5',
        ]);

        // $book->reviews()->create($validated);
        $data = [
            'review' => $validated['review'],
            'rating' => $validated['rating'],
            'user_id' => auth()->check() ? auth()->id() : null,
            'visitor_ip' => $request->ip(),
        ];

        $book->reviews()->create($data);

        return redirect()->route('books.show', $book)->with('success', 'Review was added');
    }


    /**s
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
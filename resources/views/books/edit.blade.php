@extends('layouts.auth')

@section('content')
    <div class="flex justify-center items-center h-screen bg-gray-100 pb-40">
        <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
            <form action="{{ route ('books.update', $book)}}" method="POST" class="space-y-4" onclick="return confirm('Are you sure you want to update this book?')";>
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                    <div class="flex border rounded-lg">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border-r border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                        </span>
                        <input type="text" name="author"
                            class="rounded-none rounded-r-md bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Author" value="{{ auth()->user()->name }}">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book
                        Title</label>
                    <div class="flex border rounded-lg">
                        <input type="text" name="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Show to the world your book" value="{{ $book->title }}">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.auth')
@section('content')
    <div class="pt-20">
        <div class="flex bg-white rounded-lg shadow overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-1/2 bg-cover"
                style="background-image:url( '{{ asset('assets/image/frog.jpg') }}');"></div>
            <div class="w-full p-8 lg:w-1/2">
                <h2 class="text-2xl font-bold text-gray-700 text-center">LARAVEL | BOOK CRITIQUE
                </h2>
                <p class="text-gray-600 text-center text-xs">Welcome back!</p>
                {{-- !TODO: Add route to login --}}
                <form action="{{ route('login.authenticate')}}" method="POST">
                    @csrf
                    <div class="mt-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Email
                            Address</label>
                        <input name="email"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white  focus:border-gray-500 @error('email') border-red-500 transition duration-400 ease-in-out @enderror"
                            type="email">
                        @error('email')
                            <span class="text-red-600 text-xs" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Password</label>
                        </div>
                        <input name="password"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="password">
                    </div>
                    <div class="mt-8">
                        <button type="submit"
                            class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">Login</button>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="border-b w-1/5 md:w-1/4"></span>
                        <a href="{{ route('register.form') }}" class="text-xs text-gray-500 uppercase">or sign up</a>
                        <span class="border-b w-1/5 md:w-1/4"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

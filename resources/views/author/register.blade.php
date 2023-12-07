@extends('layouts.auth')
@section('content')
    <div class="pt-20">
        <div class="flex bg-white rounded-lg shadow overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-1/2 bg-cover"
                style="background-image:url( '{{ asset('assets/image/frog.jpg') }}'); background-position: center;"></div>
            <div class="w-full p-8 lg:w-1/2">
                <h2 class="text-2xl font-bold text-gray-700 text-center uppercase">Create Account</h2>
                <p class="text-gray-600 text-center text-xs">Please input necessary fields</p>
                <form method="POST" action="{{ route ('register.store') }}" class="mt-4">
                    @csrf
                    <div class="mt-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 ">Name</label>
                        <input name="name"
                            class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name') border-red-500 transition duration-400 ease-in-out @enderror"
                            placeholder="ex. John Smith" type="text" value="{{ old ('name')}}">
                        @error('name')
                            <span class="text-red-600 text-xs" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Email
                            Address</label>
                        <input name="email"
                            class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white  focus:-500 @error('email') border-red-500 transition duration-400 ease-in-out @enderror"
                            type="email" value="{{ old ('email')}}">
                        @error('email')
                            <span class=" text-red-600 text-xs" role="alert">
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
                            class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('password') border-red-500 transition duration-400 ease-in-out @enderror"
                            type="password">
                        @error('password')
                            <span class=" text-red-600 text-xs" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <div class="flex justify-between">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Confirm
                                Password</label>
                        </div>
                        <input name="password_confirmation"
                            class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('password_confirmation') border-red-500 transition duration-400 ease-in-out @enderror"
                            type="password">

                        @error('password_confirmation')
                            <span class=" text-red-600 text-sm" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mt-8">
                        <button type="submit"
                            class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">Sign
                            Up</button>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="border-b w-1/5 md:w-1/4"></span>
                        <a href="{{ route ('login') }}" class="text-xs text-gray-500 uppercase">or Login</a>
                        <span class="border-b w-1/5 md:w-1/4"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

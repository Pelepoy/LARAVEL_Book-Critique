<header class="fixed top-0 left-0 right-0 mb-5">
    <nav class="flex justify-between items-center bg-gray-300 p-3 text-gray-700 rounded">
        <div>
            <a href="{{ route('books.index') }}" class="font-bold text-2xl">BOOK</a>
        </div>
        @auth
            <div class="">
                <h1 class="inline px-3">{{auth()->user()->name}}</h1>
              <a href="{{ route ('logout')}}" class="btn hover:bg-red-400">Logout</a>
            </div>
        @endauth
        @guest
            <div>
                <a href="{{ route ('login') }}" class="btn hover:bg-orange-400">Login</a>
                <a href="{{ route ('register.form') }}" class="btn hover:bg-red-400">Register</a>
            </div>
        @endguest
    </nav>
</header>
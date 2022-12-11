<x-layout>
    @guest()
        <a href="/register">Register</a> or <a href="login">Login</a>
    @else
        Welcome, {{ auth()->user()->name }}
    @endguest


    index
</x-layout>

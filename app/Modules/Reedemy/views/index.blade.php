<x-layout>
    @guest()
        <a href="/register">Register</a> or <a href="/sessions">Login</a>
    @else
        Welcome, {{ auth()->user()->name }}
        <br/>
        <form action="/logout" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endguest


    index
</x-layout>

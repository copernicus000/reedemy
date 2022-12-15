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

        <br/>
        <div>
            <a href="redeemer/create">Add new vinyl</a>
            <br/>

        </div>
    @endguest


    <div>
        @foreach($redeemers as $redeemer)
            <a href="{{ route('vinyl.show', $redeemer->id) }}">{{$redeemer->name}}</a>
            <br/>
        @endforeach
    </div>
</x-layout>

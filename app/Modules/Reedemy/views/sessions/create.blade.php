<x-layout>
    <div>
        <form action="/sessions" method="post">
            @csrf
            <div>
                <label for="name">Name</label>
                <br/>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="email">Email</label>
                <br/>
                <input type="text" name="email" id="email">
            </div>
            <div>
                <label for="password">Password</label>
                <br/>
                <input type="password" name="password" id="password">
            </div>

            <div>
                <button type="submit" value="submit">Login</button>
            </div>
        </form>
    </div>
</x-layout>

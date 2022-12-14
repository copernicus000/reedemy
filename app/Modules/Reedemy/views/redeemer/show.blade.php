<x-layout>
    <h5>Redeemy</h5>

    <p>{{$redeemer->name}}</p>
    <img alt="img" style="width:200px; height:200px"
         src="{{asset(str_replace('public/', '/storage/', $redeemer->file_path))}}">

    <form method="post" action="{{ route('vinyl.confirm', $redeemer->slug) }}">
        @csrf
        <div>

            <button>Confirm Purchase</button>
        </div>
    </form>
    <form action="{{ route('vinyl.verify', $redeemer->id)}}" method="post">
        @csrf
        @method('POST')
        <div>
            <label for="code">
                Code
            </label>
        </div>
        <div>
            <input type="text" name="code">
        </div>
        <div>
            <button type="submit" value="submit">
                Submit
            </button>
        </div>
    </form>
    <div>
        <a href="{{ route('vinyl.edit', $redeemer->id) }}">Edit</a>
    </div>
    <form action="{{ route('vinyl.delete', $redeemer->id) }}" method="post">
        @csrf
        @method('delete')
        <div>
            <label>
                Delete
            </label>
        </div>
        <div>
            <button type="submit" value="submit">
                Delete
            </button>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-layout>

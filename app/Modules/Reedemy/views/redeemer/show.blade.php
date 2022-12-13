<x-layout>
    <h5>Redeemy</h5>

    <p>{{$redeemer->name}}</p>
    <img alt="img" style="width:200px; height:200px"
         src="{{asset(str_replace('public/', '/storage/', $redeemer->file_path))}}">
    <form action="{{ route('vinyl.verify', ['id' => $redeemer->id])}}" method="post">
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
</x-layout>

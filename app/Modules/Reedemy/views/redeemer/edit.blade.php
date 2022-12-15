<x-layout>
    <h3>Edit</h3>
{{--    @dd($redeemer)--}}
    <form action="{{ route('vinyl.update', $redeemer->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label for="name">
                Name
            </label>
        </div>
        <div>
            <input type="text" name="name" id="name" value="{{ $redeemer->name }}" required>
        </div>

        <div>
            <label for="slug">
                Slug
            </label>
        </div>
        <div>
            <input type="text" name="slug" id="slug" value="{{ $redeemer->slug }}" required>
        </div>

        <div>
            <label>Add a file</label>
        </div>
        <div>
            <input type="file" name="filepath"  required>
        </div>

        <div>
            <button type="submit" value="submit">Submit</button>
        </div>
    </form>
</x-layout>

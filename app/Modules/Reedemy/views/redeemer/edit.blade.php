<x-layout>
    <h3>Edit</h3>
    <form action="" method="post">
        @csrf
        @method('put')
        <div>
            <label for="name">
                Name
            </label>
        </div>
        <div>
            <input type="text" name="name" id="name" value="{{ $name }}" required>
        </div>

        <div>
            <label for="slug">
                Slug
            </label>
        </div>
        <div>
            <input type="text" name="slug" id="slug" value="{{ $slug }}" required>
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

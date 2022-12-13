<x-layout>
    <form action="/redeemers" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">
                Name
            </label>
        </div>
        <div>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="slug">
                Slug
            </label>
        </div>
        <div>
            <input type="text" name="slug" id="slug" required>
        </div>

        <div>
            <label>Add a file</label>
        </div>
        <div>
            <input type="file" name="filepath" required>
        </div>

        <input type="hidden" id="userid" name="userid" value="{{ auth()->user()->id }}">
        <div>
            <button type="submit" value="submit">Submit</button>
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

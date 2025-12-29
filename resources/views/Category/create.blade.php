@extends('layouts.master')

@section('content')

<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <div class="mb-3 mt-5">
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        <span class="text-danger">
            @error('name')
            {{ $message }}
            @enderror
        </span>
        <button type="submit" class="mb-3 btn btn-primary">Create</button>

    </div>
</form>


@endsection
@extends('layouts.master')

@section('content')

<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        <span class="text-danger">
            @error('name')
            {{ $message }}
            @enderror
        </span>
    </div>
    <button type="submit">Create Category</button>
</form>


@endsection
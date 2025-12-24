@extends('Layouts.master')


@section('content')
<h1>Create a New Product</h1>
<form action="/product" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="{{old('name')}}" required>
        <span>
            @error('name')
            {{ $message }}
            @enderror
        </span>
    </div>
    <div>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" >
        <span class="text-danger">
            @error('price')
            {{ $message }}
            @enderror
        </span>
    </div>
    <div>
        <label for="category">Category:</label>
        <select id="category" name="category_id" required>
            <option value="">Select a category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
        <span class="text-danger">
            @error('category_id')
            {{ $message }}
            @enderror
        </span>
    </div>
    <div>
        {{-- // upload image field can be added here --}}
        <label for="image">Product Image URL:</label>
        <input type="file" id="image" name="photo_url[]" value="{{old('photo_url')}}" multiple>
        <span class="text-danger">
            @error('photo_url')
            {{ $message }}
            @enderror
        </span>


    </div>
    <button type="submit">Create Product</button>
</form>
@endsection

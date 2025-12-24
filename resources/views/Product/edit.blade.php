@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Edit Product</h2>
    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ old('price', $product->price) }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control" id="image">
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary mb-5">Update Product</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary mb-5">Cancel</a>

    </form>
</div>
@endsection

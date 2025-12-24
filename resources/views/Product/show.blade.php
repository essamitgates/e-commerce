@extends('Layouts.master')
@section('content')
<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> Products</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img style="height: 200px;" src="{{ $product->imagepath ? url($product->imagepath) : '' }}" alt=""></a>
                    </div>
                    <h3>{{ $product->name }}</h3>
                    <p class="product-price"><span>Per Kg</span> 85$ </p>
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    <a href="/product/{{$product->id}}/edit" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>

                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mt-5">

            <!-- Other Product Images -->
            @foreach ($product->photos as $photo)
            <div class="col-md-3 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html">
                            <img style="height: 200px;" src="{{ asset('storage/'.$photo->photo_url) }}" alt="">
                        </a>
                    </div>
                </div>

            </div>


            @endforeach
        </div>
    </div>

    @endsection
    <style>
        svg {
            height: 20px;
        }

    </style>

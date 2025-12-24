@extends('Layouts.master')
@section('content')
<!-- Cart Section -->

<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                            <tr class="table-body-row">
                                <td class="product-image"><img style="height: 100px;" src="{{ $item->product->imagepath ? url($item->product->imagepath) : '' }}" alt=""></td>
                                <td class="product-name">{{ $item->product->name }}</td>
                                <td class="product-price"><span>Per Kg</span> 85$ </td>
                                <td class="product-quantity">
                                    {{ $item->quantity ?? 1 }}
                                </td>
                                <td class="product-total">85$</td>
                                <td class="product-remove">
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end cart section -->

@endsection
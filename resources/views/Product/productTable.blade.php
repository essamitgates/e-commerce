<link href="https://cdn.datatables.net/v/dt/dt-2.3.4/datatables.min.css" rel="stylesheet" integrity="sha384-pmGS6IIcXhAVIhcnh9X/mxffzZNHbuxboycGuQQoP3pAbb0SwlSUUHn2v22bOenI" crossorigin="anonymous">


@extends('Layouts.master')
@section('content')

<!-- Create Product btn -->
<div class="mb-3">
    <a href="{{route('product.create')}}" class="btn btn-success mt-5 mr-5 ml-5">Create New Product</a>
</div>

<!-- product section -->
<table class="table table-bordered" style="width:80%" id="productTable">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td><img style="height: 100px;" src="{{ $product->imagepath ? url($product->imagepath) : '' }}" alt=""></td>
            <td>{{ $product->name }}</td>
            <td><span>Per Kg</span> 85$ </td>
            <td>{{ $product->category->name }}</td>
            <td>

                <form action="{{route('cart.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-warning cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                </form>
                <a href="{{route('product.show',$product->id)}}" class="btn btn-info "><i class="fas fa-eye"></i> View</a>



                <a href="/product/{{$product->id}}/edit" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('scripts')
<script src="https://cdn.datatables.net/v/dt/dt-2.3.4/datatables.min.js" integrity="sha384-X2pTSfom8FUa+vGQ+DgTCSyBZYkC1RliOduHa0X96D060s7Q//fnOh3LcazRNHyo" crossorigin="anonymous"></script>


<script>
    $(document).ready(function() {
        $('#productTable').DataTable();
    });
</script>
@endsection
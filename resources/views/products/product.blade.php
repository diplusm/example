@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-end border-bottom pb-2">
            <a href="{{route('product.create')}}" class="btn btn-success">New product</a>
        </div>
        @if($products->isEmpty())
            <p class="text-center">No products found.</p>
        @else
            <table class="table">
                <tr>
                    <th>Article</th>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->article}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>${{$product->price}}</td>
                    <td>
                        <form action="{{route('product.destroy', $product->id)}}" method="POST">
                            @CSRF
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach 
            </table>
        @endif
    </div>
@endsection
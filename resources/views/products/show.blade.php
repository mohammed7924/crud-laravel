@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>{{ $product->name }} (₹{{ $product->price }})</h2>
        <p><strong>Category:</strong> {{ $product->category->name }}</p>
        <p>{{ $product->description }}</p>

        <h4 class="mt-4">Product Images:</h4>
        <div class="row">
            @foreach ($product->images as $img)
                <div class="col-md-3 mb-3">
                    <img src="{{ asset('storage/' . $img->image) }}" class="img-thumbnail w-100">
                </div>
            @endforeach
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection

@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add Product</a>

        <form method="GET" action="{{ route('products.index') }}">
            <div class="form-group mb-4">
                <label for="category" class="form-label fw-bold">Filter by Category:</label>
                <select name="category_id" id="category" class="form-select shadow-sm border-primary" onchange="this.form.submit()">
                    <option value=""> All Categories </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-2">
                    <div class="card">
                        @if ($product->images->first())
                            <img src="{{ asset('storage/' . $product->images->first()->image) }}" class="card-img-top" height="250" style="width: 100%;">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $product->name }}
                                <span class="text-danger">(₹ {{ $product->price }})</span>
                            </h5>

                            <p class="card-text">{{ Str::limit($product->description, 70, '...') }}</p>
                            <p><strong>Category:</strong> {{ $product->category->name }}</p>

                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info mt-2">Edit</a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mt-2"
                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                    Delete
                                </button>
                            </form>

                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary mt-2">View More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

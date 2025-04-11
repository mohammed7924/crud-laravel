@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Edit Product</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mt-2">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="form-group mt-2">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group mt-2">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="{{ $product->price }}">
            </div>

            <div class="form-group mt-2">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-2">
                <label>Upload New Images</label>
                <input type="file" name="images[]" multiple class="form-control">
            </div>

            <div class="mt-3">
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>

        <h5 class="mt-4">Current Images:</h5>
        <div class="row">
            @foreach ($product->images as $img)
                <div class="col-md-3 mt-2">
                    <div class="position-relative">
                        <form action="{{ route('product-images.destroy', $img->id) }}" method="POST"
                              onsubmit="return confirm('Delete this image?')"
                              style="position: absolute; top: 5px; right: 10px;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" style="padding: 0.2rem 0.5rem;">&times;</button>
                        </form>
                        <img src="{{ asset('storage/' . $img->image) }}" class="img-thumbnail" width="100%">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

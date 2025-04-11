@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Add Product</h2>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mt-2">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="form-group mt-2">
                <label>Price</label>
                <input type="text" name="price" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-2">
                <label>Product Images</label>
                <input type="file" name="images[]" multiple class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection

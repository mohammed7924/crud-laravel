@extends('layouts.master')

<div class="container mt-5">
    <h2 class="mb-4 text-center">Create New Customer</h2>

    <form action="{{ route('saveUser') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="first">First Name</label>
            <input type="text" name="first" class="form-control" id="first" placeholder="First Name" value="{{ old('first') }}">
            @error('first') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="last">Last Name</label>
            <input type="text" name="last" class="form-control" id="last" placeholder="Last Name" value="{{ old('last') }}">
            @error('last') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob') }}">
            @error('dob') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
            @error('email') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="number">Phone Number</label>
            <input type="text" name="number" class="form-control" id="number" placeholder="Phone Number" value="{{ old('number') }}">
            @error('number') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="place">Place</label>
            <input type="text" name="place" class="form-control" id="place" placeholder="Place" value="{{ old('place') }}">
            @error('place') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image">
            @error('image') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-4">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
</div>

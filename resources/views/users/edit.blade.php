@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Update Customer Details</h2>

    <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ encrypt($user->id) }}">

        <div class="form-group mb-3">
            <label for="first">First Name</label>
            <input type="text" id="first" name="first" value="{{ old('first', $user->first_name) }}" class="form-control" placeholder="First Name">
            @error('first') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="last">Last Name</label>
            <input type="text" id="last" name="last" value="{{ old('last', $user->last_name) }}" class="form-control" placeholder="Last Name">
            @error('last') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" value="{{ old('dob', $user->dob) }}" class="form-control">
            @error('dob') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="Email">
            @error('email') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="number">Phone Number</label>
            <input type="text" id="number" name="number" value="{{ old('number', $user->phonenumber) }}" class="form-control" placeholder="Phone Number">
            @error('number') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="place">Place</label>
            <input type="text" id="place" name="place" value="{{ old('place', $user->place) }}" class="form-control" placeholder="Place">
            @error('place') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="image">Profile Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($user->image)
                <img src="{{ asset('storage/images/' . $user->image) }}" alt="Current Image" style="width: 100px; margin-top: 10px;">
            @endif
            @error('image') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group mb-4">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="active" {{ old('status', $user->status) === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $user->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Update</button>
    </form>
</div>
@endsection

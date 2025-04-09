@extends('layouts.master')

@section('content')
<div class="container">
    <form action={{route('update')}} method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ encrypt($user->id)}}">
        <div class="form-group">
          <label >First Name</label>
          <input type="text"    value="{{$user->first_name}}" name="first" class="form-control" aria-describedby="emailHelp" placeholder="First Name">
        </div>

        <div class="form-group">
            <label >Last Name</label>
            <input type="text"   value="{{$user->last_name}}" name="last" class="form-control" aria-describedby="emailHelp" placeholder="Last Name">
          </div>

          <div class="form-group">
            <label >Date of Birth</label>
            <input type="text"   value="{{$user->dob}}" name="dob" class="form-control" aria-describedby="emailHelp" placeholder= "Date of Birth">
          </div>

          <div class="form-group">
            <label >Email</label>
            <input type="text"   value="{{$user->email}}" name="email" class="form-control" aria-describedby="emailHelp" placeholder= "Email">
          </div>

        <div class="form-group">
            <label >Phone-Number</label>
            <input type="text"   value="{{$user->phonenumber}}" name="number" class="form-control" aria-describedby="emailHelp" placeholder= "Phone Number">
          </div>

          <div class="form-group">
            <label >place</label>
            <input type="text"   value="{{$user->place}}" name="place" class="form-control" aria-describedby="emailHelp" placeholder= "place">
          </div>

          <div class="form-group">
            <label >Profile Image</label>
            <input type="file" name="image" class="form-control">
            @if($user->image)
                <img src="{{ asset('storage/images/' . $user->image) }}" alt="Current Image" style="width: 100px; margin-top: 10px;">
            @endif
          </div>

          {{-- <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address" rows="3" required placeholder="Address">{{ old('address', $user->address) }}</textarea>
        </div> --}}

          <div class="form-group">
            <label >Status</label>
            <select name="status" id="status" class="form-control">
                <option   value="active"  @if($user->status=='active') selected @endif>Active</option>
                <option value="inactive" @if($user->status=='inactive') selected @endif>Inactive</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>
@endsection



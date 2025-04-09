@extends('layouts.master')

@section('content')
<div class="container">
    <form action={{route('saveuser')}} method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">

          <label >First Name</label>
          <input type="text"   name="first" class="form-control" aria-describedby="emailHelp" placeholder="First Name">
          @error('first')<p class="text-danger">{{$message}}</p>
          @enderror
        </div>

        <div class="form-group">
            <label >Last Name</label>
            <input type="text"   name="last" class="form-control" aria-describedby="emailHelp" placeholder="Last Name">
            @error('last')<p class="text-danger">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label >Date of Birth</label>
            <input type="text"   name="dob" class="form-control" aria-describedby="emailHelp" placeholder= "Date of Birth">
          </div>

          <div class="form-group">
            <label >Email</label>
            <input type="text"   name="email" class="form-control" aria-describedby="emailHelp" placeholder= "Email">
          </div>

        <div class="form-group">
            <label >Phone-Number</label>
            <input type="text"   name="number" class="form-control" aria-describedby="emailHelp" placeholder= "Phone Number">
          </div>

          <div class="form-group">
            <label >place</label>
            <input type="text"   name="place" class="form-control" aria-describedby="emailHelp" placeholder= "place">
          </div>

          <div class="form-group">
            <label >image</label>
            <input type="file"   name="image" class="form-control" aria-describedby="emailHelp" placeholder= "image">
          </div>


            {{-- <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" name="address" name="address" rows="3" required placeholder="Address"></textarea>
                </div> --}}



          <div class="form-group">
            <label >Status</label>
            <select name="status" id="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>
@endsection



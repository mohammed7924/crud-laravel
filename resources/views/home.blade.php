<style>
    .profile-img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ddd;

    }
</style>



@extends('layouts.master')

@if(session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif
{{-- <h5 class="text-center">welcome {{auth()->user()->first_name}} </h5> --}}
<div class="container mt-5">
    <h2 class="text-center mb-4">Customers List</h2>





{{--
    @if($user->image)
                        <img src="{{ asset('storage/images/' . $user->image) }}" alt="Profile Image" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 2px solid #ccc;">
                    @else
                        <img src="{{ asset('default-user.png') }}" alt="No Image" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 2px solid #ccc;">
                    @endif
 --}}

    {{-- @if($customer->image)
    <img src="{{ asset('storage/images/' . $customer->image) }}" alt="Profile Image" width="150" height="150" style="border-radius: 50%;">
@else
    <p>No profile image available</p>
@endif --}}


    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Create New
        </a>

            <a href="{{ route('logout') }}" class="btn btn-danger ms-2">
                <i class="bi bi-box-arrow-right">
                  </i>Logout
            </a>


            <a href="{{ route('export') }}" class="btn btn-info ms-2">
                <i class="bi bi-box-arrow-right">
                  </i>Export
            </a>

            <a href="{{ route('pdf') }}" class="btn btn-warning ms-2">
                <i class="bi bi-box-arrow-right">
                  </i>PDF
            </a>






    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Id</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Place</th>
                    <th>Status</th>
                    <th>Count</th>
                    <th>Profile</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->last_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phonenumber }}</td>
                    <td>{{ $customer->dob }}</td>
                    <td>{{ $customer->place }}</td>
                    <td>@if($customer->trashed())trashed @else active @endif</td>
                    <td>{{ $customer->orders_count }}</td>
                    <td>
                        @if($customer->image)
<img src="{{ asset('storage/images/' . $customer->image) }}" alt="Profile" class="profile-img"  >

                        @else
                            <h6>No Image</h6>
                        @endif
                    </td>

                    <td>
                        <a href="{{route('viewuser',encrypt($customer->id))}}" class="btn btn-sm btn-warning m-2">View User</a>
                        <a href="{{route('edit',encrypt($customer->id))}}" class="btn btn-sm btn-primary m-2">Edit</a>
                        <a href="{{route('delete',encrypt($customer->id))}}" class="btn btn-sm btn-danger">Delete</a>
                        @if($customer->trashed()) <a href="{{route('activate',encrypt($customer->id))}}" class="btn btn-sm btn-success">Activate</a>@endif

                        <a href="{{route('forcedelete',encrypt($customer->id))}}" class="btn btn-sm btn-info">ForceDelete</a>

                    </td>
                </tr>


                @endforeach
            </tbody>
        </table>

            <div>
                {{$customers->links()}}
            </div>
    </div>
</div>

@extends('layouts.master')



    <style>
        .profile-img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ddd;
        }
    </style>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif


    <div class="container mt-5">
        <h2 class="text-center mb-4">Customers List</h2>



        <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('products.index') }}" class="btn btn-primary me-2">
        <i class="bi bi-box-seam"></i> Products
    </a>

    <a href="{{ route('create') }}" class="btn btn-success">
        <i class="bi bi-plus-lg"></i> Create New
    </a>

    <a href="{{ route('logout') }}" class="btn btn-danger ms-2">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>

    <a href="{{ route('export') }}" class="btn btn-info ms-2">
        <i class="bi bi-box-arrow-right"></i> Export
    </a>

    <a href="{{ route('pdf') }}" class="btn btn-warning ms-2">
        <i class="bi bi-box-arrow-right"></i> PDF
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
                    @foreach ($customers as $customer)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phonenumber }}</td>
                            <td>{{ $customer->dob }}</td>
                            <td>{{ $customer->place }}</td>
                            <td>
                                {{ $customer->trashed() ? 'trashed' : 'active' }}
                            </td>
                            <td>{{ $customer->orders_count }}</td>
                            <td>
                                @if ($customer->image)
                                    <img src="{{ asset('storage/images/' . $customer->image) }}" alt="Profile" class="profile-img">
                                @else
                                    <h6>No Image</h6>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('viewuser', encrypt($customer->id)) }}" class="btn btn-sm btn-warning m-2">View</a>
                                <a href="{{ route('edit', encrypt($customer->id)) }}" class="btn btn-sm btn-primary m-2">Edit</a>
                                <a href="{{ route('delete', encrypt($customer->id)) }}" class="btn btn-sm btn-danger m-2">Delete</a>

                                @if ($customer->trashed())
                                    <a href="{{ route('activate', encrypt($customer->id)) }}" class="btn btn-sm btn-success m-2">Activate</a>
                                @endif

                                <a href="{{ route('forceDelete', encrypt($customer->id)) }}" class="btn btn-sm btn-info m-2">Force Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $customers->links() }}
            </div>
        </div>
    </div>


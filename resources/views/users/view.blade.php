<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">

            <h4 class="mb-3">User Details</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($user->status) }}</li>
            </ul>

            <h5 class="mb-3">Address</h5>
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Address:</strong> {{ $user->address->address_line_1 }}</li>
                <li class="list-group-item"><strong>City:</strong> {{ $user->address->city }}</li>
                <li class="list-group-item"><strong>State:</strong> {{ $user->address->state }}</li>
            </ul>

            <h5 class="mb-3">Orders</h5>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Placed At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user->orders as $order)
                        <tr>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ number_format($order->price, 2) }}</td>
                            <td>{{ $order->status == 1 ? 'Placed' : 'Delivered' }}</td>
                            <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

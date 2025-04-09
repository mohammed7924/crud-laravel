<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul>
                <li> Name:{{ $user->first_name }} {{ $user->last_name }}</li>
                <li>Email:{{ $user->email }}</li>

                <li>Status:{{ $user->status }}</li>
            </ul>
            <hr>
            <ul>


<li>address :{{ $user->address->address_line_1 }}</li>
<li>city :{{ $user->address->city }}</li>
<li>state :{{ $user->address->state }}</li>
{{-- <li>name:{{ $address->$user->first_name}}</li> --}}

            </ul>
            <hr>



            <h5>Orders</h5>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Order Id</th></th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Placed at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $user->orders as $order )

                    <tr>
                        <td>{{ $order->order_id}}</td>
                        <td>{{ number_format($order->price,2) }}</td>
                        <td>@if ($order->status==1)
                            placed
                            @else delivered


                        @endif</td>

                        <td>{{ $order->created_at }}</td>
                    </tr>
                        @endforeach

                </tbody>
            </table>        </div>
    </div>
</div>


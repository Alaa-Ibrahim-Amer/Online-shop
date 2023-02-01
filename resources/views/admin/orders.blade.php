@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif 
    <h3>orders</h3>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User_id</th>
                    <th>Products</th>
                    <th>shipping info</th>
                    <th>payment method</th>
                    <th >Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order['id'] }} </td>
                        <td>{{ $order['user_id'] }}</td>
                        <td>{{ $order['products_id'] }}</td>
                        <td>{{ $order['shiping_info'] }}</td>
                        <td>{{ $order['payment_method'] }}</td>
                        <td>
                            <form action="{{ url('admin/orders/' . $order['id']) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-app" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                {{ $orders->links() }}
            </tbody>
        </table>
    </div>
@endsection

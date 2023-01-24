@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif 
    <h3>products</h3>
    <div>
        <a class="btn btn-app" href="{{ url('admin/products/create') }}">
            <i class="fas fa-edit"></i> Add
        </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Bar code</th>
                    <th>Category ID</th>
                    <th>Color ID</th>
                    <th>Size ID</th>
                    <th>is_recent</th>
                    <th>is_featured</th>

                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product['id'] }} </td>
                        <td>{{ $product['name'] }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $product['image']) }}" alt="image"  style="width: 150px;higth:150px"/>
                        </td>
                        <td>{{ $product['description'] }}</td>
                        <td>{{ $product['price'] }}</td>
                        <td>{{ $product['discount'] }}</td>
                        <td>{{ $product['bar_code'] }}</td>
                        <td>{{ $product['category_id'] }}</td>
                        <td>{{ $product['color_id'] }}</td>
                        <td>{{ $product['size_id'] }}</td>
                        <td>{{ $product['is_recent'] }}</td>
                        <td>{{ $product['is_featured'] }}</td>
                        <td>
                            <a class="btn btn-app" href="{{ url('admin/products/' . $product['id']) }}">
                                <i class="fas fa-eye"></i> Show
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-app" href="{{ url('admin/products/' . $product['id'] . '/edit') }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ url('admin/products/' . $product['id']) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-app" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                {{ $products->links() }}
            </tbody>
        </table>
    </div>
@endsection

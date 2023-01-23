@extends('layouts.admin')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif 
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">categories</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <a class="btn btn-app" href="{{url('admin/categories/create')}}">
                <i class="fas fa-plus"></i> Add
            </a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Name </th>
                        <th> Image </th>
                        <th > Actions </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td><?= $category['id'] ?> </td>
                            <td><?= $category['name'] ?></td>
                            <td>
                                <img src="{{ asset('storage/'.$category['image']) }}" alt="image" />
                            </td>
                            <td >
                                <a class="btn btn-app" href="{{url('admin/categories/'.$category["id"])}}"  >
                                    <i class="fas fa-eye"></i> Show
                                </a>
                                <a class="btn btn-app" href="{{url('admin/categories/'.$category["id"].'/edit')}}"  >
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                    <form action="{{ url('admin/categories/' . $category['id']) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-app" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash" ></i> Delete
                                          </button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach

{{ $categories -> links() }}
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
  </div>
</div>
    
@endsection

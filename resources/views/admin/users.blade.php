@extends('layouts.admin')
@section('content')
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
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
            <h3 class="card-title">users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Is_admin? </th>
                        <th colspan="2"> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><?= $user['id'] ?> </td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['is_admin'] ?></td>
                            <td>
                                <form action="{{ url('admin/users/' . $user['id']) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-app" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash" ></i> Delete
                                          </button>
                                    </form>
                            </td>
                            <td>
                                <form action="{{ url('admin/users/' . $user['id']) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button class="btn btn-app" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-unlock" ></i> Add Admin
                                          </button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach

{{ $users -> links() }}
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
  </div>
</div>
    
@endsection

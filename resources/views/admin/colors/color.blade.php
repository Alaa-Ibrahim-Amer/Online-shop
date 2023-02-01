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
            <h3 class="card-title">colors</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <a class="btn btn-app" href="{{url('admin/colors/create')}}">
                <i class="fas fa-plus"></i> Add
            </a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Name </th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colors as $color)
                        <tr>
                            <td><?= $color['id'] ?> </td>
                            <td><?= $color['name'] ?></td>
                            <td>
                                <form action="{{ url('admin/colors/' . $color['id']) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-app" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash" ></i> Delete
                                          </button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach

{{ $colors -> links() }}
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
  </div>
</div>
    
@endsection

@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Striped Full Width Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> Name </th>
                        <th> Image </th>
                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td><?= $category['id'] ?> </td>
                            <td><?= $category['name'] ?></td>
                            <td>
                                <img src="{{ url($category['image']) }}" alt="image" />
                            </td>
                            <td>
                                <a class="btn btn-app">
                                    <i class="fas fa-edit"></i> Edit
                                  </a>
                                  <a class="btn btn-app">
                                    <i class="fas fa-trash"></i> Edit
                                  </a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
  </div>
</div>
    
@endsection

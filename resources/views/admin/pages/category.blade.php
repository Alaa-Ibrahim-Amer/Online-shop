@extends('admin.navbar')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card" style="overflow: auto;" style="padding: 20 20;">
                    <div class="card-body">
                        <div style="display: flex;">
                            <h4 class="card-title">Categories</h4>
                            <button style="right: 10%; position: fixed;" type="button" class="btn btn-primary"
                                href="{{ url('add-category.php') }}">
                                <i class="mdi mdi-database-plus"></i>
                                ADD category
                            </button>
                        </div>
                        <table class="table table-striped">
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
                                        <td class="py-1">
                                            <img src="{{ url($category['image']) }}" alt="image" />
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning">
                                                <i class="mdi mdi-table-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  @endsection
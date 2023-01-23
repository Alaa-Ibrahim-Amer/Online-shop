@extends('layouts.admin')
@section('content')
<h2> Show category</h2>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
    
          <!-- Default box -->
          <div class="card card-solid">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3 class="d-inline-block d-sm-none">{{$category['name']}}</h3>
                  <div class="col-12">
                    <img src="{{asset('storage/'.$category->image)}}" class="product-image" alt="Product Image">
                  </div>  
                </div>
                <div class="col-12 col-sm-6">
                  <h3 class="my-3">{{$category['name']}}</h3>
                  <hr>
    
                  <div class="mt-4">
                    <a class="btn btn-primary btn-lg btn-flat" href="{{ url('admin/categories') }}">
                      Cancel
                    </a>
                  </div>
    
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

            
@endsection
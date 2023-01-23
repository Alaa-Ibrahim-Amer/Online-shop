@extends('layouts.admin')
@section('content')
    <h2> Show product</h2>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="col-12">
                          <img src="{{asset('storage/'.$product->image)}}" class="product-image" alt="Product Image">
                        </div>  
                      </div>
                        <div class="col-12 col-sm-6">

                            <h3 class="my-3">{{ $product['name'] }}</h3>
                            <p>{{ $product['description'] }}
                                <hr>
                            <h4>Available Color</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center active">
                                    {{ $product->color['name'] }}
                                    <br>
                                    <i class="fas fa-circle fa-2x text-{{ $product->color['name'] }}"></i>
                                </label>
                            </div>

                            <h4 class="mt-3">Size</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center">
                                    <span class="text-xl">{{ $product->size['name'] }}</span>
                                </label>
                            </div>
                            @if ($product['is_featured'])
                                <br>
                                <br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center">
                                        <span class="text-xl">featured Product</span>
                                    </label>
                                </div>
                            @endif
                            @if ($product['is_recent'])
                                <br>
                                <br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-default text-center">
                                        <span class="text-xl">Recent product</span>
                                    </label>
                                </div>
                            @endif

                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    After discount: {{ $product->getPrice() }}
                                </h2>
                                <h4 class="mt-0">
                                    <small>before : {{ $product['price'] }}</small>
                                </h4>
                            </div>

                            <div class="mt-4">
                                <div class="btn btn-primary btn-lg btn-flat">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Add to Cart
                                </div>

                                <a class="btn btn-default btn-lg btn-flat" href="{{ url('admin/products') }}">
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

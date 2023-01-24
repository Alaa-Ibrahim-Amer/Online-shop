@extends('layouts.admin')
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Edit product </h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- form start -->
                            <form style="width: 100%" method="POST" action="{{ url('admin/products/' . $product->id) }}" 
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" name="name" value="{{ old('name', $product->name) }}"
                                            placeholder="Enter product name" />
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input class="form-control" name="description" value="{{ old('description', $product->description) }}"
                                            placeholder="Enter product description" />
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input class="form-control" name="price" value="{{ old('price' ,$product->price) }}"
                                            placeholder="Enter product price" />
                                        @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input class="form-control" name="discount" value="{{ old('discount', $product->discount) }}"
                                            placeholder="Enter product discount" />
                                        @error('discount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Bar Code</label>
                                        <input class="form-control" name="bar_code" value="{{ old('bar_code', $product->bar_code) }}"
                                            placeholder="Enter product Bar Code" />
                                        @error('bar_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Choose category</label>
                                        <select class="form-control" name="category_id">
                                            <option>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id',$product->category['id']) == $category['id'] ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Choose color</label>
                                        <select class="form-control" name="color_id">
                                            <option>Select Color</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}"
                                                    {{ old('color_id',$product->color['id']) == $color['id'] ? 'selected' : '' }}>{{ $color->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Choose size</label>
                                        <select class="form-control" name="size_id">
                                            <option>Select Size</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}"
                                                    {{ old('size_id',$product->size['id']) == $size['id'] ? 'selected' : '' }}>{{ $size->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="exampleInputFile" value="{{ old('image', $category->image) }}" >
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>the product is recent ?</label>
                                        <select class="form-control" name="is_recent" value={{old('is_recent',$product->is_recent)}}>

                                                <option  value="1"
                                                    {{ old('is_recent',$product->is_recent) == "1" ? 'selected' : '' }}>yes
                                                </option>
                                                <option value="0"
                                                    {{ old('is_recent',$product->is_recent) == "0" ? 'selected' : '' }}>no
                                                </option>
                                          
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>the product is featured ?</label>
                                        <select class="form-control" name="is_featured" value={{old('is_featured',$product->is_featured)}}>

                                                <option  value="1"
                                                    {{ old('is_featured',$product->is_featured) == "1" ? 'selected' : '' }}>yes
                                                </option>
                                                <option value="0"
                                                    {{ old('is_featured',$product->is_featured) == "0" ? 'selected' : '' }}>no
                                                </option>
                                          
                                        </select>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <a type="submit" class="btn btn-secondary"
                                        href="{{ url('admin/products') }}">cancle</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection

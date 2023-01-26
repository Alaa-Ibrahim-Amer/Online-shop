@extends('layouts.main')
@section('content')
<!-- Cart Start -->
     <div class="container-fluid">
      <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
          <table
            class="table table-light table-borderless table-hover text-center mb-0"
          >
            <thead class="thead-dark">
              <tr>
                <th>Products</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody class="align-middle" id="products">
                @foreach($products as $product)
              <tr>
                <td class="align-middle">
                  <img src="{{ asset('storage/' . $product['image']) }}" alt="" style="width: 50px" />
                  {{$product['name'] }}
                </td>
                <td class="align-middle">{{$product->getPrice()}}</td>
                <td class="align-middle">
                  <div
                    class="input-group quantity mx-auto"
                    style="width: 100px"
                  >
                    <div class="input-group-btn">
                      <a
                        type="button"
                        class="decBtn btn btn-sm btn-primary btn-minus"
                        href="{{ url('/cart') }}"
                        onclick="decQuantity({{$product['id']}});dec_cart_totals({{ $product->getPrice() }});"
                      >
                        <i class="fa fa-minus"></i>
                      </a>
                    </div>
                    <input
                      type="text"
                      class="quantityVal form-control form-control-sm bg-secondary border-0 text-center"
                      value= {{session()->get('quantity',0)[$product['id']]}}
                    />
                    <div class="input-group-btn">
                      <a
                        type="button"
                        class="incBtn btn btn-sm btn-primary btn-plus"
                        href="{{ url('/cart') }}"
                        onclick="incQuantity({{$product['id']}});UpdateCartTotals({{ $product->getPrice() }});"
                      >
                        <i class="fa fa-plus"></i>
                      </a>
                    </div>
                  </div>
                </td>
                <td class="align-middle">{{$product->getPrice() * session()->get('quantity',0)[$product['id']]}}</td>
                <td class="align-middle">
                  <a class="btn btn-sm btn-danger" type="button" href="{{ url('/cart') }}" onclick="deleteProduct({{$product['id']}});dec_cart_totals({{ $product->getPrice() }});return confirm('Are you sure?')">
                    <i class="fa fa-times"></i>
                  </a>
                </td>
              </tr>
           @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-lg-4">
          <form class="mb-30" action="">
            <div class="input-group">
              <input
                type="text"
                class="form-control border-0 p-4"
                placeholder="Coupon Code"
              />
              <div class="input-group-append">
                <button class="btn btn-primary">Apply Coupon</button>
              </div>
            </div>
          </form>
          <h5 class="section-title position-relative text-uppercase mb-3">
            <span class="bg-secondary pr-3">Cart Summary</span>
          </h5>
          <div class="bg-light p-30 mb-5">
            <div class="border-bottom pb-2">
              <div class="d-flex justify-content-between mb-3">
                <h6>Subtotal</h6>
                <h6 id="sub-total"></h6>
                $ {{session()->get('sub_total', 0)}}
              </div>
              <div class="d-flex justify-content-between">
                <h6 class="font-weight-medium">Shipping</h6>
                <h6 class="font-weight-medium" id="shipping"></h6>
              $ {{session()->get('shapping', 0)}}
              </div>
            </div>
            <div class="pt-2">
              <div class="d-flex justify-content-between mt-2">
                <h5>Total</h5>
                <h5 id="total"></h5>
               $ {{session()->get('sub_total', 0)+session()->get('shapping',0)}}
              </div>
              <button
                class="btn btn-block btn-primary font-weight-bold my-3 py-3"
              >
                Proceed To Checkout
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('scripts')
    <script>
        function incQuantity(id) {
            $.ajax({
                url: '{{ url('/inc-quantuty-in-cart') }}',
                data: {
                    id: id
                },
                success: (data) => {
                    console.log(data);
                }
            })
        }
        function decQuantity(id) {
            $.ajax({
                url: '{{ url('/dec-quantuty-in-cart') }}',
                data: {
                    id: id
                },
                success: (data) => {
                    console.log(data);
                }
            })
        }
        function deleteProduct(id) {
            $.ajax({
                url: '{{ url('/delete-product-in-cart') }}',
                data: {
                    id: id
                },
                success: (data) => {
                    console.log(data);
                }
            })
        }
        function UpdateCartTotals(price){
            $.ajax({
                url: '{{ url('/update-cart') }}',
                data: {
                    price: price
                },
                success: (data) => {
                    console.log(data);
                }
            })}
            function dec_cart_totals(price){
            $.ajax({
                url: '{{ url('/dec-total-cart') }}',
                data: {
                    price: price
                },
                success: (data) => {
                    console.log(data);
                }
            })}
    </script>
@endsection
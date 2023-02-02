<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
    <div class="product-item bg-light mb-4">
        <div class="product-img position-relative overflow-hidden">
            <img class="img-fluid w-100" src="{{ asset('storage/' . $product['image']) }}"
                alt="" />
            <div class="product-action">
                <a class="btn btn-outline-dark btn-square" onclick="addProductToSession({{ $product['id'] }});UpdateCartTotals({{ $product->getPrice() }});"><i
                        class="fa fa-shopping-cart"></i></a>
                <a class="btn btn-outline-dark btn-square" onclick="UpdateCartLove({{$product['id']}})"><i
                        class="far fa-heart"></i></a>
                <a class="btn btn-outline-dark btn-square" href="{{url('details/'.$product["id"])}}"><i
                        class="fa fa-search"></i></a>
            </div>
        </div>
        <div class="text-center py-4">
            <a class="h6 text-decoration-none text-truncate">{{ $product['name'] }}</a>
            <div class="d-flex align-items-center justify-content-center mt-2">
                <h5>${{ $product->getPrice() }}</h5>
                <h6 class="text-muted ml-2"><del>${{ $product['price'] }}</del></h6>
            </div>
            <div class="d-flex align-items-center justify-content-center mb-1">
                <x-stars :rating="$product['rating']"/>
                <small>({{$product['rating_count'] }})</small>
            </div>
        </div>
    </div>
</div>
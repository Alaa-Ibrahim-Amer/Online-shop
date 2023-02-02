@for ($x = 0; $x < floor($rating); $x++)
    <small class="fa fa-star text-primary mr-1"></small>
@endfor
@if ($rating - floor($rating) == 0.5)
 <small class="fa fa-star-half-alt text-primary mr-1"></small>
@endif

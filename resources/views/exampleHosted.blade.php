@extends('layouts.frontLayout.front_design')
@section('content')
    <div class="container">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{ $cartCount }}</span>
            </h4>
            <ul class="list-group mb-3">
                <?php $total_amount=0;?>
                 @foreach ($userCart as $cart)
                 <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><a href="">{{ $cart->product_name }}</a></h6>
                        <small class="text-muted">{{ $cart->product_code }} | {{ $cart->product_color }} | {{ $cart->size }}</small>
                    </div>
                    <span class="text-muted">{{ $cart->price }}</span>
                </li>
                <?php $total_amount=$total_amount + ($cart->price*$cart->quantity) ?>
                 @endforeach

                    @if(!empty(Session::get('CouponAmount')))
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Cart Sub Total</h6>
                        </div>
                        <span class="text-muted"><?php echo $total_amount?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Shipping Cost</h6>
                        </div>
                        <span class="text-muted">Free</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Discount Amount</h6>
                        </div>
                        <span class="text-muted"><?php echo $get_discount= Session::get('CouponAmount'); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BDT)</span>
                        <strong><?php echo $grand_total= $total_amount-Session::get('CouponAmount');?>TK</strong>
                    </li>
                    @else
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BDT)</span>
                        <strong><?php echo $grand_total=$total_amount?> TK</strong>
                    </li>
                    @endif
            </ul>
            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <input type="hidden" name="amount" value="{{ $grand_total }}">
            
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
            </form>
        </div>
        
    </div>
@endsection


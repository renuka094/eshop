@include('layouts.front.app')
<div class="container product-in-cart-list">
   @if(!empty($cartItems))
   <div class="row">
      <div class="col-md-12">
         <!-- <div class="row header hidden-xs hidden-sm"> -->
         <div class="row hidden-xs hidden-sm" style="height: 40px;">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><b>Cover</b></div>
               </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
               <div class="row">
                  <div class="col-lg-5 col-md-5"><b>Name</b></div>
                  <div class="col-lg-2 col-md-2"><b>Quantity</b></div>
                  <div class="col-lg-2 col-md-2"><b>Price</b></div>
                  <div class="col-lg-2 col-md-2"><b>Total</b></div>
               </div>
            </div>
         </div>
         @foreach($cartItems as $cartItem)
         <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                     <a href="{{ URL::to('product/'.$cartItem['product']->id) }}" class="hover-border">
                     @if(isset($cartItem['product']->image))
                     <img src="{{$cartItem['product']->image}}" alt="{{ $cartItem['product']->title }}" class="img-responsive img-thumbnail">
                     @else
                     <img src="https://placehold.it/120x120" alt="" class="img-responsive img-thumbnail">
                     @endif
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-8">
               <div class="row">
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                     <h4 style="margin-bottom:5px;">{{ $cartItem['product']->title }}</h4>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                     <span class="hidden-lg hidden-md">{{$cartItem['qty']}}</span>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                     <span class="hidden-lg hidden-md"><small>Price: </span>
                     Rs. {{ number_format($cartItem['product']->price, 2) }}</small>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                     <span class="hidden-lg hidden-md"><small>Total: </span>
                     Rs. {{ number_format(( $cartItem['qty'] *$cartItem['product']->price), 2) }}</small>
                  </div>
               </div>
            </div>
         </div>
         <br>
         @endforeach
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 content">
         <table class="table table-striped">
            <tfoot>
               <tr>
                  <td class="bg-warning">Subtotal</td>
                  <td class="bg-warning"></td>
                  <td class="bg-warning"></td>
                  <td class="bg-warning"></td>
                  <td class="bg-warning">Rs {{ number_format($subtotal, 2, '.', ',') }}</td>
               </tr>
               <tr>
                  <td class="bg-success">Total</td>
                  <td class="bg-success"></td>
                  <td class="bg-success"></td>
                  <td class="bg-success"></td>
                  <td class="bg-success">Rs {{ number_format($subtotal, 2, '.', ',') }}</td>
               </tr>
            </tfoot>
         </table>
         <hr>
         <div class="row">
            <div class="col-md-12">
               <div class="btn-group pull-right">
                  <a href="{{ URL::to('/') }}" class="btn btn-default">Continue shopping</a>
                  <a href="{{ URL::to('/checkout') }}" class="btn btn-primary">Go to checkout</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   @else
   <div class="row">
      <div class="col-md-12">
         <p class="alert alert-warning">No products in cart yet. <a href="{{ URL::to('/') }}">Shop now!</a></p>
      </div>
   </div>
   @endif
</div>
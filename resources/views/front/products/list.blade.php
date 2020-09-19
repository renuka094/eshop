



@include('layouts.front.app')
@if(!empty($products) && !collect($products)->isEmpty())
    <ul class="row text-center list-unstyled">
<div class="popular-items">
            <div class="container">
                <div class="row">
        @foreach($products as $product)
		 <li class="col-md-3 col-sm-6 col-xs-12 product-list">
               <div class="card p-3 item">
          <div class="thumbnail "><a href="{{URL::to('product').'/'.$product->id}}"  title="{{$product->title}}"><img src="{{$product->image}}" class="group list-group-image" height="100"></a></div>
		   <div class="product-text">
                        <h4><a href="{{URL::to('product').'/'.$product->id}}" title="{{$product->title}}">{{ substr( $product->title , 0,20) }}</a></h4>
                        <p>
                           
                              Rs.   {{ number_format($product->price, 2) }}
                          
                        </p>
                    </div>
                        <div class="product-overlay">
                            <div class="vcenter">
                                <div class="centrize">
                                    <ul class="list-unstyled list-group">
                                        <li>
                                            <form action="" class="form-inline" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="product" value="{{ $product->id }}">
                                                <a href="#" id="add-to-cart-btn" type="submit" class="btn btn-warning addCart" data-id="{{ $product->id }}"> <i class="fa fa-cart-plus"></i> Add to cart</a>
                                            </form>
                                        </li>
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>
                      
                         
                       
                    </div>

                   
                    
            </li>
        @endforeach
         </div>
                         </div>
<script>
$(document).on('click', '.addCart', function() {
    var product_id = $(this).data('id');
console.log(product_id);
var url = "ajaxadd";
  

$.ajax({

            type: "POST",
            url: url,
            data: {_token: '{{ csrf_token() }}',  product_id: product_id },
            success: function (data) {
 $('.card-stor span').text(data.msg)
            console.log(data);

            },
            error: function (data) {
            console.log('Error:', data);
            }
        });
});
</script>
  
@else
    <p class="alert alert-warning">No products yet.</p>
@endif	
@include('layouts.front.app')
<div class="row">
   <div class="col-md-6">
      <figure class="text-center product-cover-wrap col-md-8">
         <img id="main-image" class="product-cover img-responsive" src="{{ $product->image }}"
            >
      </figure>
   </div>
   <div class="col-md-6">
      <div class="product-description">
         <h1>{{ $product->title }}
            <small> {{ $product->price }}</small>
         </h1>
         <div class="description">{!! $product->description !!}</div>
         <div class="excerpt">
            <hr>
            {!!  substr($product->description, 0,100) !!}
         </div>
         <hr>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <input type="text"
                     class="form-control"
                     name="quantity"
                     id="quantity"
                     placeholder="Quantity"
                     value="@if(old('quantity')){{ old('quantity') }} @else 1 @endif" />
                  <input type="hidden" name="product" id="product_id" value="{{ $product->id }}" />
               </div>
               <a type="submit" id="addCart" class="btn btn-warning"><i class="fa fa-cart-plus"></i> Add to cart
               </a>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).on('click', '#addCart', function() {
       var product_id = $('#product_id').val();
       var quantity = $('#quantity').val();
   console.log(product_id);
   var url = '{{URL::to('ajaxadd')}}';
     
   
   $.ajax({
   
               type: "POST",
               url: url,
               data: {_token: '{{ csrf_token() }}',  product_id: product_id,'quantity':quantity },
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
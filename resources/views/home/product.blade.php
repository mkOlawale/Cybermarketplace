<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @foreach($product as $prod)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{ url('/product_details', $prod->id) }}" class="option1">
                              Products Details
                           </a>
                         <form action="{{ url('add_cart', $prod->id) }}" method="post">
                           @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input type="number" value="1" min="1" name="quantity">
                                 </div>
                                 <div class="col-md-4">
                                    <input type="submit" value="add to cart">
                                 </div>
                              </div>
                         </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/product/{{$prod->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$prod->title}}
                        </h5>
                        @if($prod->Discount_price != null)
                        <h6 style="color: red;">
                        Discount_price
                        <br>
                           ${{$prod->Discount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through; color: blue;">
                        Price
                        <br>
                           ${{$prod->price}}
                        </h6>
                        @else
                        <h6 style="color: blue;">
                        price
                        <br>
                           ${{$prod->price}}
                        </h6>
                        @endif
                     </div>
                  </div>
               </div>
               @endforeach
      </div>
         <span style="margin-top: 50px;">
            {!! $product->withQueryString()->links('pagination::bootstrap-4') !!}
         </span>
      </div>
</section>
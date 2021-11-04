@extends('layouts.frontLayout.front_design')
@section('content')
<section>
    <div class="form-group">
        <div class="p-t-20">
            @if(Session::has('flash_massage_error'))  
            
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_massage_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_massage_success'))  
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_massage_success') !!}</strong>
            </div>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('layouts.frontLayout.front_sidebar')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                <a href="{{asset('img/products/large/'.$productDetails->image)}}">
                                    <img class="mainImage" src="{{asset('img/products/medium/'.$productDetails->image)}}" alt=""height="360"/>
                                </a>
                            </div>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner ">
                                    <div class="item active thumbnails">
                                        @foreach ($productAltImages as $image)
                                        <a href="{{ asset('img/products/medium/'.$image->image) }}" data-standard="{{ asset('img/products/small/'.$image->image) }}">
                                            <img class="altImage" src="{{ asset('img/products/small/'.$image->image) }}" style="width:80px; cursor:pointer;" alt="">
                                        </a> 
                                        @endforeach
                                    </div>   
                                </div>
                            </div>
                    </div>
                    <!--/product-information-->
                    <div class="col-sm-7">
                        
                        <form name="addCartCorm" id="addCartForm" action="{{ url('add-cart') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                        <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
                        <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
                        <input type="hidden" name="product_color" value="{{ $productDetails->product_color }}">
                        <input type="hidden" name="price" id="price" value="{{ $productDetails->price }}">
                        <div class="product-information">
                            <img src="{{ asset('frontend/images/product-details/new.jpg') }}" class="newarrival" alt="" />
                            <h2>{{ $productDetails->product_name }}</h2>
                            <p>Code: {{$productDetails->product_code}}</p>
                            <img src="{{ asset('frontend/images/product-details/rating.png') }}" alt="" />
                            <p><b>Availability:</b> <span id="availability">
                                @if ($total_stock>0)In Stock @else Out of stock @endif </p>
                            </span>
                            <p>Size:
                                <select name="size" id="selSize" style="width: 80px" required>
                                    <option value="">Select</option>
                                    @foreach ($productDetails->attributes as $sizes)
                                        <option value="{{ $productDetails->id }}-{{ $sizes->size }}">{{ $sizes->size }}</option>
                                        
                                    @endforeach
                                </select>
                            </p>
                            <span>
                                <span id="getPrice">US ${{ $productDetails->price }}</span>
                                <label>Quantity:</label>
                                <input type="text" name="quantity" value="1" />
                                @if ($total_stock > 0)
                                <button type="submit" class="btn btn-fefault cart" id="cartButton">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                                @endif
                                
                            </span>
                            <a href=""><img src="{{ asset('frontend/images/product-details/share.png') }}" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                        </form>
                        
                    </div>
                </div><!--/product-details-->
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Description</a></li>
                            <li><a href="#care" data-toggle="tab">Materials & Care</a></li>
                            <li><a href="#delivery" data-toggle="tab">Delivery Options</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            <div class="col-sm-12">
                                <p>{{ $productDetails->description }}</p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="care" >
                            <div class="col-sm-12">
                                <p>{{ $productDetails->care }}</p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="delivery" >
                            <div class="col-sm-12">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem consequuntur expedita totam maiores. Tempore incidunt necessitatibus facere accusamus commodi! Quia accusantium cupiditate quod reiciendis repellendus laboriosam eaque ipsam a dignissimos.</p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p><b>Write Your Review</b></p>
                                
                                <form action="#">
                                    <span>
                                        <input type="text" placeholder="Your Name"/>
                                        <input type="email" placeholder="Email Address"/>
                                    </span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div><!--/category-tab-->
                @if($relCount>0)
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $count=1;?>
                            @foreach ($relatedProducts->chunk(3) as $chunk)
                            <div <?php if($count==1){?> class="item active" <?php } else{?> class="item" <?php }?>>	
                                @foreach ($chunk as $item)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('img/products/small/'.$item->image)}}" alt="" />
                                                <h2>${{$item->price}}</h2>
                                                <p>{{$item->product_name}}</p>
                                                <a href="{{ asset('/product/'.$item->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                             </div>
                            <?php $count++;?>
                            @endforeach 
                            
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>			
                    </div>
                </div><!--/recommended_items-->  
                @endif           
            </div>
        </div>
    </div>
</section>
    
@endsection
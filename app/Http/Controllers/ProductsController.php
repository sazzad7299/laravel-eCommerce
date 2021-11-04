<?php

namespace App\Http\Controllers;

use Auth;
use Image;

use Session;
use App\User;
use App\Order;

use App\Coupon;
use App\CmsPage;
use App\Country;
use App\Product;
use App\Category;
use App\OrdersProduct;
use App\ProductsImage;
use App\ShippingAddress;
use App\ProductsAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;


class ProductsController extends Controller
{
    public function addProduct(Request $request){
        if($request->isMethod('post')){
            $data= $request->all();
            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            if(!empty($data['description'])){
                $product->description = $data['description'];
            }else{
                $product->description = '';
            }
            if(!empty($data['care'])){
                $product->care = $data['care'];
            }else{
                $product->care = '';
            }
            $product->price = $data['price'];

            // Upload Image
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $large_image_path = 'img/products/large/'.$filename;
                    $medium_image_path = 'img/products/medium/'.$filename;
                    $small_image_path = 'img/products/small/'.$filename;
                    // resizing image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                    // store product name in product_name
                    $product->image=$filename;
                }
            }
            if(empty($data['featured'])){
                $featured=0;
            }else{
                $featured=1;
            }
            $product->featured=$featured;
            if(empty($data['status'])){
                $status=0;
            }else{
                $status=1;
            }
         
            


            $product->save();
            return redirect('/admin/view-products')->with('flash_massage_success','Product added Successfully');
         }


    	//category dropdown start
         $categories =Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option Selected disable>Select</option>";
        foreach ($categories as $category) {
            $categories_dropdown.="<option value='".$category->id."'>".$category->name."</option>";
            $sub_categories =Category::where(['parent_id'=>$category->id])->get();
            foreach ($sub_categories as $sub_category) {
                $categories_dropdown.="<option value='".$sub_category->id."'>&nbsp;--&nbsp;".$sub_category->name."</option>";
            }
        }
        //category dropdown end

    	return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }

    public function editProduct(Request $request, $id=null){
        if($request->isMethod('post')){
            $data=$request->all();


            // Upload Image
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $large_image_path = 'img/products/large/'.$filename;
                    $medium_image_path = 'img/products/medium/'.$filename;
                    $small_image_path = 'img/products/small/'.$filename;
                    // resizing image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                    
                }
            }
            elseif(!empty($data['current_image'])){
                    $filename=$data['current_image'];
                }else{
                    $filename='';
                }
                
            if (empty($data['description'])) {
                $data['description']='';
            }
            if (empty($data['care'])) {
                $data['care']='';
            }
            if(empty($data['status'])){
                $status=0;
            }else{
                $status=1;
            }
            if(empty($data['featured'])){
                $featured=0;
            }else{
                $featured=1;
            }

            Product::where(['id'=>$id])->update([
                'category_id'=>$data['category_id'],
                'product_name'=>$data['product_name'],
                'product_color'=>$data['product_color'],
                'product_code'=>$data['product_code'],
                'description'=>$data['description'],
                'care'=>$data['care'],
                'price'=>$data['price'], 
                'image'=>$filename,
                'status'=>$status,
                'featured'=>$featured
            ]);

            return redirect('/admin/view-products')->with('flash_massage_success','Product has bess updated Successfully');
        }
        $productDetails = Product::where(['id'=>$id])->first();


        //category dropdown start
         $categories =Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option Selected disable>Select</option>";
        foreach ($categories as $category) {

            if($category->id == $productDetails->category_id){
                $selected ="selected";
            } else{
                $selected ="";
            }

            $categories_dropdown.="<option value='".$category->id."'".$selected.">".$category->name."</option>";
            $sub_categories =Category::where(['parent_id'=>$category->id])->get();
            foreach ($sub_categories as $sub_category) {

                if($sub_category->id == $productDetails->category_id){
                $selected ="selected";
            } else{
                $selected ="";
            }

                $categories_dropdown.="<option value='".$sub_category->id."'".$selected.">&nbsp;--&nbsp;".$sub_category->name."</option>";
            }
        }
        //category dropdown end

        return view('admin.products.edit_product')->with(compact('productDetails','categories_dropdown'));
    }
    public function viewProducts(){
        $products = Product::orderby('id','DESC')->get();

        foreach ($products as $key => $val) {
            $category_name = Category::where(['id'=>$val->category_id])->first();
            $products[$key]->category_name=$category_name->name;
        }
        return view('admin.products.view_products')->with(compact('products'));
    }
    public function deleteProduct($id=null){
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_massage_success','Product hass beed deleted Successfully!');
    }

    public function deleteProductImage($id=null){
        //get product image
        $productImage = Product::where(['id'=>$id])->first();
        //  echo $productImage->image; die;
        //Get Image Path
        $large_image_path = 'img/products/large/';
        $medium_image_path = 'img/products/medium/';
        $small_image_path = 'img/products/small/';
        // echo $large_image_path.$productImage->image; die;
        //Delete Large Image file
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }
        //Delete Medium Image file
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }
        //Delete small Image file
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }


        //Delete Image From Products table
        Product::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_massage_success','Product Image delete Successfully');
    }



    // Product Attributes Controlling

    public function addAttributes(Request $request, $id=null)  {
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
        // $productDetails = json_decode(json_encode($productDetails));
        // echo "<pre>"; print_r($productDetails); die;
        if($request->isMethod('post')){
            $data= $request->all();
            //  echo "<pre>"; print_r($data); die;
            foreach($data['sku'] as $key => $val){
                if(!empty($val)){
                    //Prevent Duplicate SKU Check
                    $attrCountSKU = ProductsAttribute::where('sku',$val)->count();
                    if($attrCountSKU > 0){
                        return redirect('admin/add-attributes/'.$id)->with('flash_massage_error','SKU already Exist, please insert another SKU');
                    }
                    //prevent Duplicate Size Check
                    $attrCountSize = ProductsAttribute::where(['product_id'=>$id, 'size'=>$data['size'][$key]])->count();
                    if($attrCountSize > 0){
                        return redirect('admin/add-attributes/'.$id)->with('flash_massage_error',''.$data['size'][$key].' already Exist, Please insert another Size');
                    }
                    $attribute = new ProductsAttribute;
                    $attribute->product_id =$id;
                    $attribute->sku= $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price= $data['price'][$key];
                    $attribute->stock= $data['stock'][$key];
                    $attribute->save();
                }
            }
            return redirect('admin/add-attributes/'.$id)->with('flash_massage_success','Product Attributes add Successfylly');
        }
        return view('admin.products.add_attributes')->with(compact('productDetails'));
    }
    
    public function editAttributes(Request $request, $id=null) {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            foreach($data['idAttr'] as $key=>$attr){
                ProductsAttribute::where(['id'=>$data['idAttr'][$key]])->update(['price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
            }
        }
        return redirect()->back()->with('flash_massage_success','Product Attributes Update Successfylly');
    }
    public function addImages(Request $request, $id=null)  {
        $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
 
        if($request->isMethod('post')){
            $data= $request->all();
            if($request->hasFile('image')){
                
                
                //upload Images
                $files = $request->file('image');
               foreach($files as $file){
                    
                    $image = new ProductsImage;
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $large_image_path = 'img/products/large/'.$filename;
                    $medium_image_path = 'img/products/medium/'.$filename;
                    $small_image_path = 'img/products/small/'.$filename;
                    // resizing image
                    Image::make($file)->save($large_image_path);
                    Image::make($file)->resize(600,600)->save($medium_image_path);
                    Image::make($file)->resize(300,300)->save($small_image_path);
                    $image->image =$filename;
                    
                    $image->product_id=$data['product_id'];
                    $image->save();
               }
               
            }
            // echo "<pre>"; print_r($data); die;
         return redirect('admin/add-images/'.$id)->with('flash_massage_success','Product Images added successfuly');

        }
        $productsImages = ProductsImage::where(['product_id'=>$id])->get();
        return view('admin.products.add_images')->with(compact('productDetails','productsImages'));
    }
    public function deleteAltImage($id=null){
        //get product image
        $productImage = ProductsImage::where(['id'=>$id])->first();
        //  echo $productImage->image; die;
        //Get Image Path
        $large_image_path = 'img/products/large/';
        $medium_image_path = 'img/products/medium/';
        $small_image_path = 'img/products/small/';
        // echo $large_image_path.$productImage->image; die;
        //Delete Large Image file
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }
        //Delete Medium Image file
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }
        //Delete small Image file
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }


        //Delete Image  table
        ProductsImage::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_massage_success','Alternative Image(s) has been deleted Successfully');
    }
    
    public function deleteAttribute($id=null){
        ProductsAttribute::where(['id'=>$id])->delete();
     return redirect()->back()->with('flash_massage_success', 'Attribute has been deleted Successfully!');
    }


    //binding url for catagory

    public function products( $url){
        //Get 404 page in category Url
        $countCategory = Category::where(['url'=>$url, 'status'=>1])->count();
        if($countCategory==0){
            abort(404);
        }
        
        //Get All categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
      
        $categories_menu = "";
        foreach($categories as $cat){
            
            if($cat->status==1){
                $categories_menu .= "<div class='panel-heading'>
                                    <h4 class='panel-title'>
                                        <a data-toggle='collapse' data-parent='#accordian' href='#".$cat->id."'>
                                            <span class='badge pull-right'><i class='fa fa-plus'></i></span>
                                            ".$cat->name."
                                        </a>
                                    </h4>
                                </div>
                                <div id='".$cat->id."' class='panel-collapse collapse'>
                                <div class='panel-body'>
                                    <ul>";
                                    $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
                                    foreach($sub_categories as $subcat){
                                        if($subcat->status==1){
                                            $categories_menu .="<li><a href='/products/".$subcat->url."'>$subcat->name </a></li>";
                                        }
                                    }
                                        
                                    $categories_menu .="</ul>
                                </div>
                            </div>";
            }
        
        }

        $categoryDetails = Category::where(['url'=>$url])->first();
        
        if($categoryDetails->parent_id==0){
            //If url is main Category
            $subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();

            foreach($subCategories as $subcat){
                $cat_ids[]=$subcat->id;
                
            } 
            $allProduct = Product::whereIn('category_id',$cat_ids)->where('status',1)->get();
            
        }else{
            $allProduct = Product::where(['category_id'=>$categoryDetails->id])->where('status',1)->get();
        }
        
        $cmsDetails = CmsPage::where('status',1)->get();
        return view('products.listing')->with(compact('categories','categories_menu','allProduct','categoryDetails','cmsDetails'));
    }
    public function product($id =null){
        $productCount = Product::where(['id'=>$id, 'status'=>1])->count();
        if($productCount==0){
            abort(404);
        }
        $productDetails = Product::where(['id'=>$id])->count();
        $productDetails=json_decode(json_encode($productDetails));

        
        if($productDetails==0){
            abort(404);
        }
        //Get All categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
       
        $categories_menu = "";
        foreach($categories as $cat){
            
            if($cat->status==1){
                $categories_menu .= "<div class='panel-heading'>
                                    <h4 class='panel-title'>
                                        <a data-toggle='collapse' data-parent='#accordian' href='#".$cat->id."'>
                                            <span class='badge pull-right'><i class='fa fa-plus'></i></span>
                                            ".$cat->name."
                                        </a>
                                    </h4>
                                </div>
                                <div id='".$cat->id."' class='panel-collapse collapse'>
                                <div class='panel-body'>
                                    <ul>";
                                    $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
                                    foreach($sub_categories as $subcat){
                                        if($subcat->status==1){
                                            $categories_menu .="<li><a href='/products/".$subcat->url."'>$subcat->name </a></li>";
                                        }
                                    }
                                        
                                    $categories_menu .="</ul>
                                </div>
                            </div>";
            }
        
        }
        $cmsDetails = CmsPage::where('status',1)->get();
        $productDetails = Product::with('attributes')->where('id',$id)->first();
        $productAltImages= ProductsImage::where('product_id',$id)->get();
        //get product stock
         $total_stock = ProductsAttribute::where('product_id',$id)->sum('stock');

         $relatedProducts = Product::where('id','!=',$id)->where(['category_id'=>$productDetails->category_id])->where('status',1)->get();
         $relCount= Product::where('id','!=',$id)->where(['category_id'=>$productDetails->category_id])->where('status',1)->count();

         
    

        // $relatedProducts=json_decode(json_encode($relatedProducts));
        // echo "<pre>"; print_r($relatedProducts); die;
        

        return view('products.detail')->with(compact('productDetails','categories_menu','productAltImages','total_stock','relatedProducts','relCount','cmsDetails'));

    }
    public function getProductPrice(Request $request)
    {
        $data = $request->all();

        // echo "<pre>"; print_r($data); die;
        $proArr = explode("-",$data['idSize']);
        $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        echo $proAttr->price;
        echo "#";
        echo $proAttr->stock;

    }
    public function addToCart(Request $request){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $data=$request->all();
        // echo "<pre>";print_r($data);die;
        $product_size =explode('-',$data['size']);
        $getProStock = ProductsAttribute::where(['product_id'=>$data['product_id'],'size'=>$product_size[1]])->first();
        // echo $getProStock->stock;die;
        if($getProStock->stock<$data['quantity']){
            return redirect()->back()->with('flash_massage_error','Required Quantity is not Available');
        }
        if(empty(Auth::user()->email)){
            $data['user_email']='';
        }else{
            $data['user_email']=Auth::user()->email;
        }
        $session_id=Session::get('session_id');
        if(empty($session_id)){
            $session_id= str_random(40);
            Session::put('session_id',$session_id);
        }
        
        if(empty($data['size'])){
            $sizeArr[1]='';
            
        }else{
            $sizeArr = explode("-",$data['size']);
        }
        
            
        
        if(empty(Auth::check())){
            // echo "<pre>";print_r($data); die;
            $countProducts=DB::table('cart')->where([
                'product_id'=>$data['product_id'],
                'product_color'=>$data['product_color'],
                'size'=>$sizeArr[1],

                'session_id'=>$session_id
            ])->count();
            // Matching product with prevent
            // insert product in cart table
            if($countProducts>0){
                return redirect()->back()->with('flash_massage_error','You added this product before');
            }
        }else{
            $countProducts=DB::table('cart')->where([
                'product_id'=>$data['product_id'],
                'product_color'=>$data['product_color'],
                'size'=>$sizeArr[1],

                'user_email'=>$data['user_email'],
            ])->count();
            // Matching product with prevent
            // insert product in cart table
            if($countProducts>0){
                return redirect()->back()->with('flash_massage_error','You added this product before');
            }
        }
        
            $getSKU = ProductsAttribute::select('sku')->where(['product_id'=>$data['product_id'],'size'=>$sizeArr[1]])->first();
            
            
            DB::table('cart')->insert([
                'product_id'=>$data['product_id'],
                'product_name'=>$data['product_name'],
                'product_color'=>$data['product_color'],
                'product_code'=>$getSKU->sku,
                'price'=>$data['price'],
                'quantity'=>$data['quantity'],
                'size'=>$sizeArr[1],
                'user_email'=>$data['user_email'],
                'session_id'=>$session_id
            ]);
            return redirect('cart')->with('flash_massage_success','Product has been added in Cart');
        
    }
    public function cart(Request $request)
      {
        $session_id=Session::get('session_id');
        
          if(!empty(Auth::check())){
              $user_email = Auth::user()->email;
            //   echo "<pre/>";print_r($user_email);die;
              $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
              $cartCount=DB::table('cart')->where(['user_email'=>$user_email])->count();
              
          }else{
            $session_id=Session::get('session_id');
            // echo "<pre/>";print_r($session_id);die;
            $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
            $cartCount=DB::table('cart')->where(['session_id'=>$session_id])->count();
          }
          
          foreach($userCart as $key=>$product){
            $productDetails=Product::where('id',$product->product_id)->first();
            $userCart[$key]->image=$productDetails->image;
        }
        
        $cmsDetails = CmsPage::where('status',1)->get();
        return view('products.cart')->with(compact('userCart','cartCount','cmsDetails'));
    }
    public function deleteCartItem($id = null)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('cart')->where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_massage_success','Product hass beed deleted Successfully!');
    }
    public function updateCartQuantity($id=null,$quantity=null)
    {   
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $getCartDetails =DB::table('cart')->where('id',$id)->first();
        $getAttributeStock=ProductsAttribute::where('sku',$getCartDetails->product_code)->first();
        echo $getAttributeStock->stock; echo "--";
        $update_quantity= $getCartDetails->quantity+$quantity;
        // echo $update_quantity; die;
        if($getAttributeStock->stock>=$update_quantity){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
        return redirect('cart')->with('flash_massage_success','Product Quantity Update successfully');
        }
        else{
            
            return redirect('cart')->with('flash_massage_error','Stock is not availbale');
        }
        
    }

    public function applyCoupon(Request $request)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $data =$request->all();
        // echo "<pre>"; print_r($data); die;
        $couponCount= Coupon::where('coupon_code',$data['coupon_code'])->count();
        if($couponCount==0){
         return redirect()->back()->with('flash_massage_error','Coupon Code is not Valid');
        }
        else{
            $couponDetails=Coupon::where('coupon_code',$data['coupon_code'])->first();
            // if coupon code Inactive
            if($couponDetails->status==0){
                return redirect()->back()->with('flash_massage_error','Coupon Code is not Active');
            }

            // if coupon code Expired
            $expiry_date= $couponDetails->expiry_date;
           $current_date= date("Y-m-d");
            if($expiry_date < $current_date){
                return redirect()->back()->with('flash_massage_error','Coupon Code is Expired');
            }

            // discount amount for valid applyCoupon
                $session_id=Session::get('session_id');
                if(Auth::check()){
                    $user_email = Auth::user()->email;
                    $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
                }else{
                  $session_id=Session::get('session_id');
                  $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
                }
                $totalAmount=0;
                foreach($userCart as $item){
                $totalAmount = $totalAmount + ($item->price*$item->quantity);
            }
            // if Amount type is Fixed
            if($couponDetails->amount_type=="fixed"){
                $couponAmount= $couponDetails->amount;
            }
            else{
                $couponAmount=$totalAmount* ($couponDetails->amount/100);
            }
            Session::put('CouponAmount',$couponAmount);
            Session::put('CouponCode',$data['coupon_code']);

            return redirect()->back()->with('flash_massage_success','Coupon Code Applyed Successfully');


        }
    }
    public function checkout(Request $request)
    {
        $user_id = Auth::User()->id;
        $user_email = Auth::User()->email;
        $userDetails= User::find($user_id);
        $countries= Country::get();

        $shippingCount = ShippingAddress::where('user_id',$user_id)->count();
        if($shippingCount > 0){
            $shippingDetails = ShippingAddress::where('user_id',$user_id)->first();
        }
        //update cart table with user-email

        $session_id = Session::get('session_id');
        // echo "<pre>"; print_r($session_id);die;
        DB::table('cart')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;

            if(empty($data['billing_name']) || empty($data['billing_address']) || empty($data['billing_city']) || empty($data['billing_state']) || empty($data['billing_country']) || empty($data['billing_postcode']) || empty($data['billing_mobile']) || empty($data['shipping_name']) || empty($data['shipping_address']) || empty($data['shipping_city']) || empty($data['shipping_state']) || empty($data['shipping_country']) || empty($data['shipping_postcode']) || empty($data['shipping_mobile'])){
                return redirect()->back()->with('flash_error_message','Please fill up all Fields');
            }
            User::where('id',$user_id)->update([
                'name'=>$data['billing_name'],
                'address'=>$data['billing_address'],
                'city'=>$data['billing_city'],
                'state'=>$data['billing_state'],
                'country'=>$data['billing_country'],
                'postcode'=>$data['billing_postcode'],
                'mobile'=>$data['billing_mobile']
            ]);
            if($shippingCount>0){
                // update shippingAddress
                ShippingAddress::where('user_id',$user_id)->update([
                    'name'=>$data['shipping_name'],
                    'address'=>$data['shipping_address'],
                    'city'=>$data['shipping_city'],
                    'state'=>$data['shipping_state'],
                    'country'=>$data['shipping_country'],
                    'postcode'=>$data['shipping_postcode'],
                    'mobile'=>$data['shipping_mobile']
                ]);
            }else{
                $shipping= new ShippingAddress;
                $shipping->user_id =$user_id;
                $shipping->email=$user_email;
                $shipping->name = $data['shipping_name'];
                $shipping->address=$data['shipping_address'];
                $shipping->city=$data['shipping_city'];
                $shipping->state=$data['shipping_state'];
                $shipping->country=$data['shipping_country'];
                $shipping->postcode=$data['shipping_postcode'];
                $shipping->mobile=$data['shipping_mobile'];
                $shipping->save();
            }
           return redirect()->action('ProductsController@orderReview');
        }
        $cmsDetails = CmsPage::where('status',1)->get();
        return view('products.checkout')->with(compact('userDetails','countries','shippingDetails','cmsDetails'));
    }
    public function orderReview(Request $request)
    {
        $user_id = Auth::User()->id;
        $user_email = Auth::User()->email;
        $userDetails= User::find($user_id);
        $shippingDetails = ShippingAddress::where('user_id',$user_id)->first();
        $shippingDetails =json_decode(json_encode($shippingDetails));

        $userCart = DB::table('cart')->where(['user_email'=>$user_email])->get();
          foreach($userCart as $key=>$product){
            $productDetails=Product::where('id',$product->product_id)->first();
            $userCart[$key]->image=$productDetails->image;
        }
        $cmsDetails = CmsPage::where('status',1)->get();
        return view('products.review')->with(compact('userDetails','shippingDetails','userCart','cmsDetails'));
    }
    public function placeOrder(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            
            if($data['payment_method']=="COD"){
                $grand_total= $data['grand_total'];
            // echo "<pre>";print_r($grand_total);die;
            $user_id=Auth::user()->id;
            
            $user_email=Auth::user()->email;
            
            //get shipping address form Users
            // $shippingDetails = ShippingAddress::where(['user_email'=>$user_email])->first();
            $shippingDetails = ShippingAddress::where(['user_id'=>$user_id])->first();
            $shippingDetails= json_decode(json_encode($shippingDetails));
            // echo "<pre>";print_r($shippingDetails);die;

            if(empty(Session::get('CouponCode'))){
                $coupon_code='';
            }else{
                $coupon_code= Session::get('CouponCode');
            }
            if(empty(Session::get('CouponAmount'))){
                $coupon_amount='0';
            }else{
                $coupon_amount= Session::get('CouponAmount');
            }
            $order = new Order;
            $order->user_id = $user_id;
            $order->user_email= $shippingDetails->email;
            $order->name=$shippingDetails->name;
            $order->address=$shippingDetails->address;
            $order->city=$shippingDetails->city;
            $order->state=$shippingDetails->state;
            $order->country=$shippingDetails->country;
            $order->postcode=$shippingDetails->postcode;
            $order->mobile=$shippingDetails->mobile;
            $order->coupon_code=$coupon_code;
            $order->coupon_amount=$coupon_amount;
            $order->payment_method=$data['payment_method'];
            $order->grand_total=$grand_total;
            $order->order_status ="New";
            $order->shipping_charges="0";
            $order->save();
            
            //insert product checkout details in orders_product table
            //get the last inserted id
            $order_id = DB::getPdo()->lastInsertId();
            $cartProducts =DB::table('cart')->where(['user_email'=>$user_email])->get();
            // echo "<pre>"; print_r($cartProducts);die;
            foreach($cartProducts as $order){
                $orderPro = new OrdersProduct;
                $orderPro->order_id= $order_id;
                $orderPro->user_id =$user_id;
                $orderPro->product_id = $order->product_id;
                $orderPro->product_code = $order->product_code;
                $orderPro->product_color = $order->product_color;
                $orderPro->product_name = $order->product_name;
                $orderPro->product_color = $order->product_color;
                $orderPro->product_size = $order->size;
                $orderPro->product_qty = $order->quantity;
                $orderPro->product_price = $order->price;
                $orderPro->save();
                

            }
            DB::table('cart')->where('user_email',$user_email)->delete();
            $email = $user_email;
            $messageData =[
                'email' => $email,
                'name' => Auth::user()->name,
                'order_id'=>$order_id,
                'amount'=>$grand_total
            ];
            Mail::send('emails.order',$messageData,function($message) use($email){
                $message->to($email)->subject('Order Placed');
            });
            Session::put('order_id', $order_id);
            Session::put('grand_total', $data['grand_total']);
             $cmsDetails  = CmsPage::where('status',1)->get();
            //  echo "<pre>";print_r($cmsDetails);die;
                return view('/success')->with(compact('cmsDetails'));
            }else{
                return redirect('/example2');
            }
            

        }
    }
    public function success()       
    {
        $user_email = Auth::user()->email;
         DB::table('cart')->where('user_email',$user_email)->delete();
         Session::forget('CouponAmount');
        return view('success');
    }
    public function viewOrders()
    {
        $orders = Order::with('orders')->orderBy('id','DESC')->get();
        $orders= json_decode(json_encode($orders));
        // echo "<pre>";print_r($orders);die;

       return view('admin.products.orders')->with(compact('orders'));
    }
    public function orderDetails($order_id)
    {
        $orderDetails = Order::with('orders')->where('id',$order_id)->orderBy('id','DESC')->first();
        $orderDetails= json_decode(json_encode($orderDetails));
        // echo "<pre>";print_r($orderDetails);die; 
        $user_id =$orderDetails->user_id;
        // echo "<pre>";print_r($user_id);die;
        $userDetails = User::where('id',$user_id)->first();
        $userDetails= json_decode(json_encode($userDetails));
        // echo "<pre>";print_r($userDetails);die; 
        return view('admin.products.order_details')->with(compact('orderDetails','userDetails'));
    }
    public function orderStatus($id,$status)
    {
        $mainorder = Order::findOrFail($id);
        $mainorder= json_decode(json_encode($mainorder));
        if($mainorder->order_status==$status){
            return redirect()->back()->with('flash_message_success','This Order is Already Updates As same');
        }else{
            Order::where('id',$id)->update(['order_status'=>$status]);
            return redirect()->back()->with('flash_message_success','Order Status Updated Successfully');
        }
        // echo "<pre>";print_r($mainorder);die; 
        
    }
    public function productSearch(Request $request)
    {
        if($request->isMethod('post')){
            $data=$request->all();
            $search_product =$data['srcItem'];
            // echo "<pre>";print_r($data);die;


            $categories = Category::with('categories')->where(['parent_id'=>0])->get();
      
            $categories_menu = "";
            foreach($categories as $cat){
                
                if($cat->status==1){
                    $categories_menu .= "<div class='panel-heading'>
                                        <h4 class='panel-title'>
                                            <a data-toggle='collapse' data-parent='#accordian' href='#".$cat->id."'>
                                                <span class='badge pull-right'><i class='fa fa-plus'></i></span>
                                                ".$cat->name."
                                            </a>
                                        </h4>
                                    </div>
                                    <div id='".$cat->id."' class='panel-collapse collapse'>
                                    <div class='panel-body'>
                                        <ul>";
                                        $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
                                        foreach($sub_categories as $subcat){
                                            if($subcat->status==1){
                                                $categories_menu .="<li><a href='/products/".$subcat->url."'>$subcat->name </a></li>";
                                            }
                                        }
                                            
                                        $categories_menu .="</ul>
                                    </div>
                                </div>";
                }
            
            }
            $allProduct =Product::where('product_name','like','%'.$search_product.'%')->orwhere('product_code',$search_product)->where('status',1)->get();
            $cmsDetails = CmsPage::where('status',1)->get();
            return view('products.listing')->with(compact('categories','categories_menu','allProduct','search_product','cmsDetails'));
        }
    }
    
}


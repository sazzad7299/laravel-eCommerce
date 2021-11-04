<?php

namespace App\Http\Controllers;

use App\Banner;
use App\CmsPage;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        // $allProduct = Product::orderBy('id','DESC')->where('status',1)->where('featured',1)->get(2);

        //Random Product Showing
        $allProduct = Product::inRandomOrder()->where('status',1)->where('featured',1)->paginate(8);

        //Get All categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $categories_menu = "";
        foreach($categories as $cat){
            if($cat->status==1){
                $categories_menu .=  "<div class='panel-heading'>
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
                                       if($subcat->status == 1){
                                        $categories_menu .="<li><a href='/products/".$subcat->url."'>$subcat->name </a></li>";
                                       }
                                    }
                                        
                                    $categories_menu .="</ul>
                                </div>
                            </div>";
        
            }
        }

        $sliders = Banner::where('status','1')->get();
        $bannersCount=$banners = Banner::where('status','1')->count();
        
        
        $cmsDetails = CmsPage::where('status',1)->get();
        $cmsDetails= json_decode(json_encode($cmsDetails));
        // echo "<pre>";print_r($cmsDetails);die;

        return view('index')->with(compact('allProduct','categories_menu','sliders','bannersCount','cmsDetails'));
    }
}

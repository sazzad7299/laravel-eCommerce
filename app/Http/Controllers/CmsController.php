<?php

namespace App\Http\Controllers;

use App\CmsPage;
use App\Category;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function addPage(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $cmsPage = new CmsPage;
            $cmsPage->title=$data['title'];
            $cmsPage->url=$data['url'];
            $cmsPage->description=$data['description'];
            if(empty($data['status'])){
                $status = '0';
            }else{
                $status = $data['status'];
            }
            $cmsPage->status= $status;
            $cmsPage->save();
            return redirect()->back()->with('flash_massage_success','Page Added Successfully');

        }
        return view('admin.pages.add_page');
    }
    public function editPage(Request $request,$id)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['status'])){
                $status='0';
            }else{
                $status =$data['status'];
            }
            CmsPage::where('id',$id)->update(['title'=>$data['title'],'url'=>$data['url'],'description'=>$data['description'],'status'=>$status]);
            return redirect()->back()->with('flash_massage_success','Cms Update Successfully');
        }
        $cmsPage = CmsPage::where('id',$id)->first();

        return view('admin.pages.edit_cms')->with(compact('cmsPage'));
    }
    public function viewPage()
    {
        $cmsPages = CmsPage::get();
        // $cmsPages = json_decode(json_encode($cmsPages));
        
        // echo "<pre>";print_r($cmsPages);die;


        return view('admin.pages.view_pages')->with(compact('cmsPages'));
    }
    public function deletePage($id)
    {
       CmsPage::where('id',$id)->delete();

       return redirect('/admin/view-cms')->with('flash_massage_success','Cms Delete Successfully');
    }
    public function cmsPages($url)
    {
        // echo $url; die;
        $countCms = CmsPage::where(['url'=>$url, 'status'=>1])->count();
        if($countCms==0){
            abort(404);
        }
        $cmsPageDetails = CmsPage::where('url',$url)->first();
        $cmsPageDetails =json_decode(json_encode($cmsPageDetails));
        // echo "<pre>";print_r($cmsPageDetails);die;
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
        return view('pages.cms_page')->with(compact('cmsPageDetails','categories','categories_menu','cmsDetails'));
    }
}

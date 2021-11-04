<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
    	if($request->isMethod('post')){
    		$data= $request->all();
            //  echo "<pre>"; print_r($data);die;
            if(empty($data['status'])){
                $status=0;
            }else{
                $status=1;
            }
    		$category = new Category;
    		$category->name = $data['name'];
            $category->parent_id = $data['parent_id'];
    		$category->description = $data['description'];
            $category->url = $data['url'];
            $category->status=$status;
    		$category->save();
            return redirect('/admin/view-categories')->with('flash_massage_success', 'Category Created Successfully');

    	}
        $levels = Category::where(['parent_id'=>0])->get();
    	return view('admin.categories.add_category')->with(compact('levels'));
    }
    
    public function editCategory(Request $request,$id =null){
        

        if($request->isMethod('post')){
            
            

            $data= $request->all();

            //status
            if(empty($data['status'])){
                $status=0;
            }else{
                $status=1;
            }

            // echo "<pre>"; print_r($data);die;

            Category::where(['id'=>$id])->update(['name'=>$data['name'],'description'=>$data['description'],'url'=>$data['url'],'status'=>$status]);
            return redirect('/admin/view-categories')->with('flash_massage_success','Category Update Successfully');
        }
        
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();

        return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));
    }

    public function viewCategory(){
        $categories = Category::get();
        return view('admin.categories.view_categories')->with(compact('categories'));
    }

    public function deleteCategory(Request $request,$id=null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();

            return redirect()->back()->with('flash_massage_success','Category Deleted Successfully');
        }
    }
}

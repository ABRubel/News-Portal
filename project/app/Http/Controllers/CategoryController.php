<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function addCategory()
    {
        return view('admin.category.add-category');
    }

    public function newCategory(Request $request)
    {
        Category::saveCategoryInfo($request);
        return redirect('/category/add-category')->with('message', 'Data Saved Successfully');
    }

    public function manageCategory()
    {
        $categories = Category::all();
        return view('admin.category.manage-category', [
            'categories' => $categories
        ]);
    }

    public function editCategory($id)
    {
        $category=Category::find($id);
        return view('admin.category.edit-category',[
            'category' =>$category
        ]);
    }

    public function updateCategory(Request $request)
    {
        Category::updateCategoryInfo($request);
        return redirect('/category/manage-category')->with('message','Data Updated Successfully');
    }
    public function deleteCategory(Request $request)
    {
        $blogs=Blog::where('category_id',$request->id)->get();
        if($blogs){
            return redirect('/category/manage-category')->with('message','Sorry! Data cannot be deleted because some blog in this category');
        }
        else{
            $category=Category::find($request->id);
            $category->delete();
            return redirect('/category/manage-category')->with('message','Data Deleted Successfully');
        }
    }
}

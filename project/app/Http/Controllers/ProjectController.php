<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use DB;
class ProjectController extends Controller
{
    //
    public function index()
    {
        $blogs=Blog::where('publication_status',1)->orderBy('id','desc')->get();
        $categories=Category::where('publication_status',1)->get();
        return view('front.home.home',[
            'blogs' => $blogs,
            'categories' => $categories
        ]);
    }
    public function categoryBlog($id)
    {
        $categories=Category::where('publication_status',1)->get();
        return view('front.category.category-blog',[
            'categories' => $categories,
            'blogs' =>Blog::where('category_id',$id)->where('publication_status',1)->get()
        ]);
    }

    public function blogDetails($id)
    {
        $categories=Category::where('publication_status',1)->get();
        return view('front.blog.blog-details',[
            'categories' => $categories,
            'blog' =>Blog::find($id),
            'comments' => DB::table('comments')
                        ->join('visitors','comments.visitor_id','=','visitors.id')
                        ->where('comments.blog_id',$id)
                        ->where('comments.publication_status',1)
                        ->select('comments.*','visitors.first_name','visitors.last_name')
                        ->orderBy('comments.id','desc')
                        ->get()
        ]);
    }
}

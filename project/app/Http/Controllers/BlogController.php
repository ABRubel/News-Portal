<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use DB;
class BlogController extends Controller
{
    public function addBlog()
    {
        $categories=Category::where('publication_status',1)->get();
        return view('admin.blog.add-blog',[
            'categories' => $categories
        ]);
    }
    public function newBlog(Request $request)
    {
        $image      =$request->file('blog_image');
        $imagename  =$image->getClientOriginalName();
        $directory  ='blog-images/';
        $image->move($directory,$imagename);

        $blog=new Blog();
        $blog->category_id              =   $request->category_id;
        $blog->blog_title               =   $request->blog_title;
        $blog->blog_short_description   =   $request->blog_short_description;
        $blog->blog_long_description    =   $request->blog_long_description;
        $blog->blog_image               =   $directory.$imagename;
        $blog->publication_status       =   $request->publication_status;
        $blog->save();
        return redirect('/blog/add-blog')->with('message','Blog info created successfully!!!');
    }
    public function manageBlog()
    {
        $blogs      = DB::table('blogs')
                    ->join('categories','blogs.category_id','=','categories.id')
                    ->select('blogs.*','categories.category_name')
                    ->orderBy('blogs.id','desc')
                    ->get();
        return view('admin.blog.manage-blog',[
            'blogs' => $blogs
        ]);
    }
    public function editBlog($id)
    {
        return view('admin.blog.edit-blog',[
            'categories' => Category::where('publication_status',1)->get(),
            'blog'      => Blog::find($id)
        ]);
    }
    public function updateBlog(Request $request)
    {
        $blog=Blog::find($request->id);
        $blogImage                      =   $request->file('blog_image');
        $blog->category_id              =   $request->category_id;
        $blog->blog_title               =   $request->blog_title;
        $blog->blog_short_description   =   $request->blog_short_description;
        $blog->blog_long_description    =   $request->blog_long_description;
        $blog->publication_status       =   $request->publication_status;
        if($blogImage)
        {
            unlink($blog->blog_image);
            $imagename  =$blogImage->getClientOriginalName();
            $directory  ='blog-images/';
            $blogImage->move($directory,$imagename);
            $blog->blog_image               =   $directory.$imagename;
        }
        $blog->save();
        return redirect('blog/manage-blog')->with('message','Blog info updated successfully!');
    }
    public function deleteBlog(Request $request)
    {
        $blog=Blog::find($request->id);
        if (file_exists($blog->blog_image))
            unlink($blog->blog_image);
        $blog->delete();
        return redirect('blog/manage-blog')->with('message','Blog info deleted successfully!');
    }
}

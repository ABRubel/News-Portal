@extends('admin.master')
@section('title','Manage Category')
@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h1 class="text-center text-success">
                        {{Session::get('message')}}
                    </h1>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Category Name</th>
                            <th>Blog Title</th>
                            <th>Blog Image</th>
                            <th>Publication</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($blogs as $blog)
                            <tr class="odd gradeX">
                                <td>{{$i++}}</td>
                                <td>{{$blog->category_name}}</td>
                                <td>{{$blog->blog_title}}</td>
                                <td>
                                    <img src="{{asset($blog->blog_image)}}" height="100" width="120">
                                </td>
                                <td>{{$blog->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    <a href="{{route('edit-blog',['id'=>$blog->id])}}">Edit</a>
                                    <a href="#" class="delete-Btn" id="{{$blog->id}}"
                                       onclick="event.preventDefault()
                                           var check=confirm('Are you sure to delete this?')
                                           if(check)
                                           {
                                                document.getElementById('deleteBlogForm'+'{{$blog ->id}}').submit();
                                           }"
                                    >Delete</a>
                                    <form id="deleteBlogForm{{$blog ->id}}" method="POST"
                                          action="{{route('delete-blog')}}">
                                        @csrf
                                        <input type="hidden" value="{{$blog ->id}}" name="id"/>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

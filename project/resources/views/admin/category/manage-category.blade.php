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
                            <th>Category Description</th>
                            <th>Publication</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($categories as $category)
                            <tr class="odd gradeX">
                                <td>{{$i++}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->category_description}}</td>
                                <td>{{$category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    <a href="{{route('edit-category',['id'=>$category->id])}}">Edit</a>
                                    <a href="#" class="delete-Btn" id="{{$category->id}}"
                                       onclick="event.preventDefault()
                                               var check=confirm('Are you sure to delete this?')
                                               if(check)
                                               {
                                                    document.getElementById('deleteCategoryForm'+'{{$category ->id}}').submit();
                                               }"
                                    >Delete</a>
                                    <form id="deleteCategoryForm{{$category ->id}}" method="POST"
                                          action="{{route('delete-category')}}">
                                        @csrf
                                        <input type="hidden" value="{{$category ->id}}" name="id"/>
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

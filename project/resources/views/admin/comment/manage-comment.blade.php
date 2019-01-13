@extends('admin.master')
@section('title','Manage Comment')
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
                            <th>Blog Title</th>
                            <th>Visitor Name</th>
                            <th>Comment</th>
                            <th>Publication status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($comments as $comment)
                            <tr class="odd gradeX">
                                <td>{{$i++}}</td>
                                <td>{{$comment->blog_title}}</td>
                                <td>{{$comment->first_name.' '.$comment->last_name}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>{{$comment->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    @if($comment->publication_status == 1)
                                        <a href="#" class="delete-Btn" id="{{$comment->id}}"
                                           onclick="event.preventDefault()
                                               var check=confirm('Are you sure to unpublish this?')
                                               if(check)
                                               {
                                               document.getElementById('deleteUnpublishedForm'+'{{$comment ->id}}').submit();
                                               }"
                                        >Delete</a>
                                        <form id="deleteUnpublishedForm{{$comment ->id}}" method="POST"
                                              action="{{route('delete-comment')}}">
                                            @csrf
                                            <input type="hidden" value="{{$comment ->id}}" name="id"/>
                                        </form>
                                    @else
                                        <a href="{{route('comment-published',['id'=>$comment->id])}}">Published</a>
                                    @endif
                                    <a href="#" class="delete-Btn" id="{{$comment->id}}"
                                       onclick="event.preventDefault()
                                           var check=confirm('Are you sure to delete this?')
                                           if(check)
                                           {
                                           document.getElementById('deleteCommentForm'+'{{$comment ->id}}').submit();
                                           }"
                                    >Delete</a>
                                    <form id="deleteCommentForm{{$comment ->id}}" method="POST"
                                          action="{{route('delete-comment')}}">
                                        @csrf
                                        <input type="hidden" value="{{$comment ->id}}" name="id"/>
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

@extends('front.master')

@section('body')
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$blog->blog_title}}</h1>
        <h1 class="mt-4 mb-3">{{Session::get('message')}}</h1>
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{asset($blog->blog_image)}}" alt="">
                <hr>
                <!-- Date/Time -->
                <p>Posted on {{$blog->created_at}}</p>
                <hr>
                <!-- Post Content -->
                <p class="lead">{{$blog->blog_short_description}}</p>
                <p>{!! $blog->blog_long_description!!}</p>
                <hr>
                <!-- Comments Form -->
                @if($visitorId = Session::get('visitorId'))
                    <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form action="{{route('new-comment')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="visitor_id"value="{{$visitorId}}"/>
                                <input type="hidden" name="blog_id"value="{{$blog->id}}"/>
                                <textarea class="form-control" rows="3" name="comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                @else
                <!-- Single Comment -->
                    <div class="card my-4">
                     <div class="card-body">
                         <h5 class="card-title text-danger text-center">You must be logged in or registered to make comment.</h5>
                         <h2 class="card-title text-center"><a class="text-info" href="{{route('visitor-login')}}">Login </a>
                         <span class="text-warning"><a href="{{route('sign-up')}}"> Register</a></span>
                         </h2>
                     </div>
                </div>
                @endif
                @foreach($comments as $comment)
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">{{$comment->first_name.' '.$comment->last_name}}</h5>
                        <div>{{$comment->comment}}</div>
                        <br/>

                        <p class="small">Created at: {{$comment->created_at}}<span>&nbsp Updated at: {{$comment->updated_at}}</span></p>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                        </div>
                    </div>
                </div>
                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <a href="#">HTML</a>
                                    </li>
                                    <li>
                                        <a href="#">Freebies</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection

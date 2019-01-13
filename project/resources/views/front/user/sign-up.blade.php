@extends('front.master')

@section('body')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3"> </h1>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('new-sign-up')}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">First Name</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="first_name">
                                    </div>
                                 </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="last_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Email Address</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email_address" onblur="emailCheck(this.value)">
                                        <span id="res" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Phone Number</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="phone_number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Address</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="submit" class="btn btn-success btn-block" id="regBtn" value="Register"/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="reset" class="btn btn-danger btn-block"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

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
                                    @foreach($categories as $category)
                                    <li>
                                        <a class="nav-link text-info " href="{{route('category-blog',['id'=>$category->id])}}">{{$category->category_name}}</a>
                                    </li>
                                    @endforeach
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
    <script>
        function emailCheck(email) {
            var xmlHttp    = new XMLHttpRequest();
            var serverPage = 'http://localhost/project/public/email-check/'+email;
            xmlHttp.open('GET',serverPage);
            xmlHttp.onreadystatechange = function () {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
                {
                    document.getElementById('res').innerHTML=xmlHttp.responseText;
                    if (xmlHttp.responseText == 'Sorry! Email already exists'){
                        document.getElementById('regBtn').disabled = true;
                    }
                }
            }
            xmlHttp.send();
        }
    </script>
@endsection

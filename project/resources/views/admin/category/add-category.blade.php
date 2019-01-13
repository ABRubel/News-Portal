@extends('admin.master')
@section('title','Add Category')
@section('body')
    <br/>
    <div class="row">
        <div class="col-md-12">
            <br/>
            <div class="well">
                <div class="text-center text-success">
                <h1>
                {{Session::get('message')}}
                </h1>
                </div>
                <form action="{{route('new-category')}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <input type="text" name="category_name" class="form-control"/>
                        </div>
                    </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="category_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Publication Status</label>
                            <div class="col-md-9 radio">
                                <label><input type="radio" name="publication_status" value="1"/>Published</label>
                                <label><input type="radio" name="publication_status" value="0"/>Unpublished</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="text-center col-md-5 ">
                                <input type="submit" name="btn" class="btn btn-success btn-block"
                                value="Save Category Info"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('admin.master')
@section('title','Edit Category')
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
                <form action="{{route('update-category')}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control"/>
                            <input type="hidden" name="id" value="{{$category->id}}" class="form-control"/>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="category_description">{{$category->category_description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Publication Status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" {{$category->publication_status ==1 ? 'checked' : ''}} name="publication_status" value="1"/>Published</label>
                            <label><input type="radio" {{$category->publication_status ==0 ? 'checked' : ''}} name="publication_status" value="0"/>Unpublished</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"></label>
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block"
                                   value="Update Category Info"/>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
@extends('layouts.app')
@section('title')
    Home
@endsection
@include('cdn')
@section('BlogPostCount')
    @if(\Illuminate\Support\Facades\Session::has('totalNumberOfBlog'))
        {{\Illuminate\Support\Facades\Session::get('totalNumberOfBlog')}}
    @else
        0
    @endif
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(\Illuminate\Support\Facades\Session::has('successMessage'))
            <div class="alert alert-success py-3 my-2 alert-dismissible fade show" role="alert">
                {{\Illuminate\Support\Facades\Session::get('successMessage')}}
                <button type="button" class="close" data-dismiss="alert">
                    <span >&times;</span>
                </button>
            </div>
        @endif
            @if(\Illuminate\Support\Facades\Session::has('DeletesuccessMessage'))
                <div class="alert alert-danger py-3 my-2 alert-dismissible fade show" role="alert">
                    {{\Illuminate\Support\Facades\Session::get('DeletesuccessMessage')}}
                    <button type="button" class="close" data-dismiss="alert">
                        <span >&times;</span>
                    </button>
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('UpdatesuccessMessage'))
                <div class="alert alert-warning py-3 my-2 alert-dismissible fade show" role="alert">
                    {{\Illuminate\Support\Facades\Session::get('UpdatesuccessMessage')}}
                    <button type="button" class="close" data-dismiss="alert">
                        <span >&times;</span>
                    </button>
                </div>
            @endif
        <div class="card-deck">
        @foreach($userBlogData as $data)
        <div class="col-md-12  mb-2 ">
            <div class="row">
                <div class="col-md-4 m-3" style="display: inline-block; position: relative; width: 200px; height: 200px; overflow: hidden; border-radius: 50%;">
                    <img class=" img-circle img-responsive img-center"  style="width: auto; height: 100%; margin-left: -50px;" src="/BlogCoverImage/{{$data->cover_image}}" alt="cover image"/>
                </div>



                    <div class="col-md-7 align-bottom">
                        <div class=" bg-light h-20 " >
                <div class="">
                    <h1 class=""><a class="text-primary"  style="text-decoration: none" href="/blog/view/{{$data->id}}">{{$data->blog_title}}</a></h1>
                     <h5 style="overflow: hidden;text-overflow: ellipsis; display: -webkit-box;-webkit-line-clamp: 2;  line-clamp: 2;-webkit-box-orient: vertical;">
                         {{$data->blog_content}}
                     </h5>
                </div>

                <div class=" bg-light" >
                    <div class="d-flex ">
                        <a class="btn btn-outline-warning btn-md m-2 " href="/blog/edit/{{$data->id}}">Edit</a>
                    <a class="btn btn-outline-danger btn-md m-2 " href="/blog/delete/{{$data->id}}">delete</a>
                    </div>
                </div>
                    </div>
            </div>
            <hr>
            </div>
        </div>
            @endforeach
        </div>
    </div>

@endsection

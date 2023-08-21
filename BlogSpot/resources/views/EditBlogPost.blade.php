@extends('layouts.app')
@include('cdn')
@section('title')
    Edit Blog
@endsection
@section('BlogPostCount')
    @if(\Illuminate\Support\Facades\Session::has('totalNumberOfBlog'))
        {{\Illuminate\Support\Facades\Session::get('totalNumberOfBlog')}}
    @else
        0
    @endif
@endsection
@section('content')
    <div class="container">
        <form class="text-center  p-5 ml-5" action="/blog/update/{{$dataForEdit->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <p class="h4 mb-4">Edit Blog</p>
            <input type="text" id="defaultContactFormName" class="form-control mb-4" name="title" placeholder="Title" value="{{$dataForEdit->blog_title}}">

            <div class="form-group">
                <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" name="blog_content" rows="3" placeholder="Blog content" >{{$dataForEdit->blog_content}}</textarea>

            </div>
            <div class="mt-2">
                <label class="form-label" for="customFile">upload your blog cover image</label>
                <input type="file" class="form-control"  name="cover_image" id="customFile" value="{{$dataForEdit->cover_image}}" />
            </div>
            <button class="btn btn-info btn-block mt-4 p-2" type="submit">Send</button>
        </form>
    </div>
@endsection

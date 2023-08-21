@php use Illuminate\Support\Facades\Session; @endphp
@extends('layouts.app')
@include('cdn')
@section('title')
    Add New Blog
@endsection
@section('BlogPostCount')
    @if(Session::has('totalNumberOfBlog'))
        {{Session::get('totalNumberOfBlog')}}
    @else
        0
    @endif
@endsection
@section('content')
    <form class="text-cente p-5 ml-2" action="/blog/create" method="post" enctype="multipart/form-data"
          style="right:30%">
        @csrf
        <p class="h4 mb-4 text-center">Add New Blog</p>
        <input type="text" id="defaultContactFormName" class="form-control mb-4" name="title" placeholder="Title">
        @error('title')

        <div class="alert-md text-center alert-danger m-1 p-2"><i

                class="fa-solid fa-triangle-exclamation p-1"></i>{{ $message }}</div>

        @enderror
        <div class="form-group">
            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" name="blog_content" rows="3"
                      placeholder="Blog content"></textarea>
            @error('blog_content')
            <div class="alert-md text-center alert-danger m-1 p-2">
                <i class="fa-solid fa-triangle-exclamation p-1"></i>{{ $message }}</div>
            @enderror

        </div>
        <div class="mt-2">
            <label class="form-label" for="customFile">upload your blog cover image</label>
            <input type="file" class="form-control" name="cover_image" id="customFile"/>
            @error('cover_image')
            <div class="alert-md text-center alert-danger m-1 p-2">
                <i class="fa-solid fa-triangle-exclamation p-1"></i>{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-info btn-block mt-4 p-2" type="submit">Send</button>
    </form>

@endsection

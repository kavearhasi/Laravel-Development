@php use Illuminate\Support\Facades\Session; @endphp
@extends('layouts.app')
@section('title')
    {{$fullBlog[0]['blog_title']}}
@endsection
@include('cdn')
@section('BlogPostCount')
    @if(Session::has('totalNumberOfBlog'))
        {{Session::get('totalNumberOfBlog')}}
    @else
        0
    @endif
@endsection
@section('content')
    <div class="container">
        <h2 class="text-dark   my-2" style="font-size: 60px"> {{$fullBlog[0]['blog_title']}}</h2>
        <hr>
        <div>
            <img class="rounded" src="/BlogCoverImage/{{$fullBlog[0]['cover_image']}}" alt="cover image"
                 style="margin: auto;width: 100%;height: 400px">
        </div>
        <p class="my-2 text-dark border border-secondary rounded p-4" style="font-size: 25px">
            {{$fullBlog[0]['blog_content']}}
        </p>
        <div class="d-flex justify-content-end ">
            <a class="btn btn-outline-warning btn-md m-2 " href="/blog/edit/ {{$fullBlog[0]['id']}}">Edit</a>
            <a class="btn btn-outline-danger btn-md m-2 " href="/blog/delete/{{$fullBlog[0]['id']}}">delete</a>
            <div>
            </div>
@endsection

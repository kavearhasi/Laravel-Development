<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewBlogDatavalidation;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BlogPostController extends Controller
{
    /*
     * INSERT INTO blog_posts ( blog_title, blog_content, users_id, cover_image) VALUES (?,?,?,?);
     * */
    public function store(NewBlogDatavalidation $newBlogDatavalidation)
    {
        $image = $newBlogDatavalidation->file('cover_image');
        $imageFileName = $image->getClientOriginalName();
        $image->move(public_path('BlogCoverImage'), $imageFileName);
        $user_id = Auth::user()->id;
        $newBlogPosts = new BlogPost();
        $newBlogPosts->blog_title = $newBlogDatavalidation->title;
        $newBlogPosts->blog_content = $newBlogDatavalidation->blog_content;
        $newBlogPosts->users_id = $user_id;
        $newBlogPosts->cover_image = $imageFileName;
        $newBlogPosts->save();
        return redirect('/home')->with('successMessage', 'New Blog post successfully added');
    }

    /*
     * select * from blog_posts where blog_posts.id in (9, 10, 13)
     * */
    public function show(BlogPost $blogPost)
    {
        $user_id = Auth::user()->id;
        $userBlog = BlogPost::all()->where('users_id', $user_id);
        $num = $userBlog->count();
        Session::put('totalNumberOfBlog', $num);

        return view('/home', ["userBlogData" => $userBlog]);
    }

    /*
     * select * from blog_posts where id = 3
     * */
    public function edit($id)
    {
        $editBlog = BlogPost::all()->find($id);
        return view('EditBlogPost', ['dataForEdit' => $editBlog]);
    }

    /*
     * UPDATE blog_posts
    S ET blog_title = "new title", blog_content = "content,cover_image=$imageFileName
     WHERE id = $id ;
     * */
    public function update(Request $request, $id)
    {
        $image = $request->file('cover_image');
        $updateBlog = BlogPost::all()->find($id);
        $updateBlog->blog_title = $request->title;
        $updateBlog->blog_content = $request->blog_content;
        $hasFile = $request->allFiles();
        if ($hasFile) {
            $imageFileName = $image->getClientOriginalName();
            $image->move(public_path('BlogCoverImage'), $imageFileName);
            $updateBlog->cover_image = $imageFileName;
        }
        $updateBlog->update();
        return redirect('/home')->with('UpdatesuccessMessage', 'Your Blog post updated successfully');
    }

    /*
     *DELETE FROM blog_posts WHERE 'id = $id;
     * */
    public function destroy($id)
    {
        $deleteBlog = BlogPost::all()->find($id);
        $deleteBlog->delete();
        return redirect('/home')->with('DeletesuccessMessage', 'Your blog post deleted successfully ');
    }

    /*
     * select (blog_title,blog_content,cover_image,id) from `blog_posts` where `id` = 3
     * */
    public function view($id)
    {
        $fullblog = BlogPost::where('id', $id)->get(['blog_title', 'blog_content', 'cover_image', 'id']);
        return view('ViewOfBlog', ["fullBlog" => $fullblog]);
    }
}

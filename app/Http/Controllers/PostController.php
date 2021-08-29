<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->paginate(2);
        return view('welcome', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $post = new Post;

        $post->title = $request->input('title');
        $post->price = $request->input('price');
        $post->category_id = $request->input('category_id');
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $new_name = rand() . "_" . $image->getClientOriginalname();
            $image->move(public_path('uploads/images/'), $new_name);
            $post->image = $new_name;
        }

        $post->save();
        return redirect('/post');
    }

    public function edit($post)
    {
        $categories = Category::all();
        $post = Post::find($post);

        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update(Request $request, $post)
    {
        $post = Post::find($post);
        $post->title = $request->input('title');
        $post->price = $request->input('price');
        $post->category_id = $request->input('category_id');
        if ($request->hasfile('image')) {
            $destination = 'uploads/images/' . $post->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('image');
            $new_name = rand() . "_" . $image->getClientOriginalname();
            $image->move(public_path('uploads/images/'), $new_name);
            $post->image = $new_name;
        }

        $post->update();
        return redirect('/post');
    }

    public function delete($post)
    {
        $post = Post::find($post);
        $destination = 'uploads/images/' . $post->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $post->delete();
        return redirect()->back();
    }

    public function search()
    {
        $search_text = $_GET['query'];

        $posts = Post::where('title', 'LIKE', '%' . $search_text . '%')
            ->with('category')->paginate();

        return view('posts.search', ['posts' => $posts]);
    }



    public function getCategorypost($post)
    {
        if (!Post::where('category_id', $post)->exists())

            return abort(404);
        $arr = Post::where('category_id', $post)->get();

        $post_ids = null;

        foreach ($arr as $pc)
            $post_ids[] = $pc->id;
        $posts = Post::whereIn('id', $post_ids)->get();
        return view('home', ['posts' => $posts]);
    }

    public function getPostDetail($post)
    {
        $postDetail = Post::find($post);

        $related = Post::where('category_id', '=', $postDetail->category->id)
            ->where('id', '!=', $postDetail->id)
            ->get();

        return view('posts.post-detail', ['postDetail' => $postDetail, 'related' => $related]);
    }
}

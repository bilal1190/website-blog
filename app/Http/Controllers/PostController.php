<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'category') ->latest()->paginate(9);
        return view('posts.list', [
            'posts' => $posts,
        ]);
    }

    public function create(){
        $categories = Category::all();
        return view('posts.create', compact('categories'));

    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' =>'required|string|max:255',
            'content' =>'required',
            'category_id' =>'required|exists:categories,id'

        ]);
        if($validator->passes()){
           
            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
            ]);
            return redirect()->route('posts.index')->with('success', 'Post created successfully');
        }
        else{
            return redirect()->route('posts.create')->withInput()->withErrors($validator);
        }
    }

    // public function show(Post $post){
    //     return view('posts.show', compact('post'));
    // }

    public function edit($id){
        $post = Post::findOrFail($id);
        $categories = Category::all();

    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}

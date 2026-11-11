<?php
namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
  

    public function index()
    {
        $postsform=Post::all();
        return view('index', ['posts' => $postsform]);
    }

    public function show($id)
    {
        $singlepostfromdb=Post::findOrFail($id);

        return view('show', ['post' => $singlepostfromdb]);
    }

    public function create()
    {
       $users = User::all();


        return view('create', ['users' => $users]); 
    }

    
public function store(Request $request)
{
    $request->validate([
        'title' => ['required','min:3,max:12'],
        'description' => ['required','min:20,max:120'],
        'user_id' => 'required|exists:users,id',
    ]);

    $post = new Post();
    $post->title = $request->input('title');
    $post->description = $request->input('description');
    
    $post->user_id = $request->input('user_id'); 

    $user = User::find($request->input('user_id'));
    if ($user) {
        $post->post_creator = $user->name;
    }

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully!');
}


    public function edit($id)
    {
        $users = User::all();
        $post = Post::findOrFail($id);

        return view('edit', ['post' => $post, 'users' => $users]);

    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');    
    }
public function update($id)
{
    request()->validate([
        'title' => ['required','min:3,max:12'],
        'description' => ['required','min:20,max:120'],
        'user_id' => 'required|exists:users,id',
    ]);
    $post = Post::findOrFail($id);

    $post->title = request('title');
    $post->description = request('description');
    
    $post->user_id = request('user_id');

    if (request('user_id')) {
        $user = User::find(request('user_id'));
        $post->post_creator = $user ? $user->name : null;
    }

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post updated successfully!'); 
}


}

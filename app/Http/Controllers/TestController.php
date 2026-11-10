<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    // Shared mock data array so all methods can access it easily
    private $posts = [
        [
            'id' => 1, 
            'title' => 'PHP', 
            'description' => 'PHP is a popular general-purpose scripting language that is especially suited to web development.', 
            'posted_by' => 'Ahmed', 
            'email' => 'ahmed@example.com', 
            'created_at' => '2022-10-10 09:00:00'
        ],
        [
            'id' => 2, 
            'title' => 'Javascript', 
            'description' => 'JavaScript is a programming language that conforms to the ECMAScript specification.', 
            'posted_by' => 'Mohamed', 
            'email' => 'mohamed@example.com', 
            'created_at' => '2023-08-20 07:00:00'
        ],
        [
            'id' => 3, 
            'title' => 'HTML', 
            'description' => 'HTML is the standard markup language for documents designed to be displayed in a web browser.', 
            'posted_by' => 'Mahmoud', 
            'email' => 'mahmoud@example.com', 
            'created_at' => '2023-10-06 06:00:00'
        ],
        [
            'id' => 4, 
            'title' => 'CSS', 
            'description' => 'CSS is a style sheet language used for describing the presentation of a document written in HTML or XML.', 
            'posted_by' => 'Ali', 
            'email' => 'ali@example.com', 
            'created_at' => '2023-08-07 05:00:00'
        ],
    ];

    public function index()
    {
        return view('index', ['posts' => $this->posts]);
    }

    public function show($id)
    {
        // Safely find the post by ID regardless of array index
        $post = collect($this->posts)->firstWhere('id', $id);

        if (!$post) {
            abort(404);
        }

        return view('show', ['post' => $post]);
    }

    public function create()
    {
        return view('create'); 
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        // Handle store logic here (e.g., redirect to index)
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function edit($post)
    {
        // Find the specific post to edit
        $postItem = collect($this->posts)->firstWhere('id', $post);

        if (!$postItem) {
            abort(404);
        }

        return view('edit', ['post' => $postItem]);
    }

    public function destroy($post)
    {
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');    
    }
}
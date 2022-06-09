<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\post\PutRequest;
use App\Http\Requests\post\StoreRequest;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Self_;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function Psy\debug;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = 'Blog';
        $categories = Category::pluck('title');
        $posts = Post::paginate(10);
        return view('dashboard.post.index', compact('titulo', 'categories', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = "Crear post Nuevo";
        $categories = Category::pluck('id', 'title');
        $post = new Post();
        return view('dashboard.post.create', compact('titulo', 'categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data = array_map('trim', $data);
        $post = new Post($data);
        $post->save();
        //return redirect()->route('post.show', $post->id);
        return to_route('post.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $titulo = $post->title;
        $categories = Category::pluck('title');
        return view('dashboard.post.show', compact('titulo', 'post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $titulo = "Edita la entrada: " . $post->title;
        $categories = Category::pluck('id', 'title');
        return view('dashboard.post.edit', compact('post', 'titulo', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
        $post->update($request->validated());
        //return redirect()->route('post.show', $post->id);
        return to_route('post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        /**
         * Se puede agregar una vista de la confirmacion del borrado 
         * o simplemente retornarnar al index con con un mensaje o no
         */
        return to_route('post.index');
    }
    protected
    function debuguear($debug)
    {
        echo "<pre>";
        var_dump($debug);
        echo "</pre>";
        exit;
    }
}

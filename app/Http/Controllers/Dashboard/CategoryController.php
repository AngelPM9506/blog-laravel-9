<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\PutRequest;
use App\Http\Requests\category\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = 'Categorias';
        $categories = Category::pluck('title');
        $categoriess = Category::where('id', '>', 0)->orderBy('title')->paginate(10);
        return view('dashboard.category.index', compact('titulo', 'categories', 'categoriess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = 'Crear nueva entrada';
        $category = new Category();
        $categories = Category::pluck('title');
        return view('dashboard.category.create', compact('titulo', 'category', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = array_map('trim', $request->validated());
        $category = new Category($data);
        $category->save();
        return to_route('category.show', $category->id)->with('status', 'Creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->paginate(2);
        $titulo = $category->title;
        $categories = Category::pluck('title');
        return view('dashboard.category.show', compact('titulo', 'categories', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $titulo = $category->title;
        $categories = Category::pluck('title');
        return view('dashboard.category.edit', compact('titulo', 'categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Category $category)
    {
        if ($category->update($request->validated())) {
            return to_route('category.show', $category->id)->with('status', 'Actualizado correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $lastCategory = $category->title;
        $category->delete();
        return to_route('category.index')->with('status', 'Categoria '.$lastCategory.' eliminada correctamente');
    }
}

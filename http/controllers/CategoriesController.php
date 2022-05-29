<?php namespace Goosy\Blog\Http\Controllers;

use Goosy\Blog\Models\Category;
use Illuminate\Routing\Controller;
use Goosy\Blog\Http\Resources\CategoryResource;

class CategoriesController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(
            Category::isPublished()
                ->orderBy('created_at', 'desc')
                ->paginate(20)
        );
    }

    public function show($id)
    {
        $category = Category::isPublished()
            ->findOrFail($id);

        return new CategoryResource($category);
    }
}

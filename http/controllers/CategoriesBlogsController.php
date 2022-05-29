<?php namespace Goosy\Blog\Http\Controllers;

use Goosy\Blog\Models\Category;
use Illuminate\Routing\Controller;
use Goosy\Blog\Http\Resources\BlogResource;

class CategoriesBlogsController extends Controller
{
    public function show($id)
    {
        $category = Category::isPublished()
            ->findOrFail($id);

        $blogs = $category->blogs;

        return BlogResource::collection($blogs);
    }
}

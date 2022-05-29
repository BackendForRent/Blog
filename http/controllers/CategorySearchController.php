<?php namespace Goosy\Blog\Http\Controllers;

use Goosy\Blog\Models\Category;
use Illuminate\Routing\Controller;
use October\Rain\Support\Facades\Input;
use Goosy\Blog\Http\Resources\CategoryResource;

class CategorySearchController extends Controller
{
    public function show()
    {
        $search = Input::get('q');

        $result = CategoryResource::collection(
            Category::isPublished()
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->get()
        );
        if (count($result)) {
            return $result;
        }
        else {
            return response()->json(['error' => 'No categories found', 'statusCode' => 404], 404);
        }
    }
}

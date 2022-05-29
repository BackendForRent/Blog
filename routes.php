<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use WApi\ApiException\Http\Middlewares\ApiExceptionMiddleware;

use Goosy\Blog\Http\Controllers\BlogsController;
use Goosy\Blog\Http\Controllers\BlogSearchController;

use Goosy\Blog\Http\Controllers\AuthorsController;
use Goosy\Blog\Http\Controllers\AuthorSearchController;
use Goosy\Blog\Http\Controllers\AuthorsBlogsController;

use Goosy\Blog\Http\Controllers\CategoriesController;
use Goosy\Blog\Http\Controllers\CategorySearchController;
use Goosy\Blog\Http\Controllers\CategoriesBlogsController;

use Goosy\Blog\Http\Controllers\TagsController;
use Goosy\Blog\Http\Controllers\TagSearchController;
use Goosy\Blog\Http\Controllers\TagsBlogsController;

Route::group([
    'prefix'     => 'api/v1',
    'middleware' => [
        ApiExceptionMiddleware::class,
        'api',
    ]
], function (Router $router) {
    $router->get('blogs/search', [BlogSearchController::class, 'show'])->name('q');
    $router->get('blogs', [BlogsController::class, 'index']);
    $router->get('blogs/{id}', [BlogsController::class, 'show']);

    $router->get('authors/search', [AuthorSearchController::class, 'show'])->name('q');
    $router->get('authors', [AuthorsController::class, 'index']);
    $router->get('authors/{id}', [AuthorsController::class, 'show']);
    $router->get('authors/{id}/blogs', [AuthorsBlogsController::class, 'show']);

    $router->get('categories/search', [CategorySearchController::class, 'show'])->name('q');
    $router->get('categories', [CategoriesController::class, 'index']);
    $router->get('categories/{id}', [CategoriesController::class, 'show']);
    $router->get('categories/{id}/blogs', [CategoriesBlogsController::class, 'show']);

    $router->get('tags/search', [TagSearchController::class, 'show'])->name('q');
    $router->get('tags', [TagsController::class, 'index']);
    $router->get('tags/{id}', [TagsController::class, 'show']);
    $router->get('tags/{id}/blogs', [TagsBlogsController::class, 'show']);
});

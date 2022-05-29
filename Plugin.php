<?php namespace Goosy\Blog;

use Backend;
use System\Classes\PluginBase;

/**
 * Blog Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = [
        'WApi.ApiException'
    ];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Blog',
            'description' => 'Goosy Blog plugin.',
            'author'      => 'Goosy',
            'icon'        => 'icon-pencil-square'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Goosy\Blog\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'goosy.blog.some_permission' => [
                'tab' => 'Blog',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'blog' => [
                'label'       => 'Blog',
                'url'         => Backend::url('goosy/blog/blogs'),
                'icon'        => 'icon-pencil-square',
                'permissions' => ['goosy.marketplaceclient.*'],
                'order'       => 500,
                'sideMenu'    => [
                    'Blogs'           => [
                        'label'       => 'Blogs',
                        'icon'        => 'icon-pencil-square',
                        'url'         => Backend::url('goosy/blog/blogs'),
                        'description' => 'All created blogs.',
                        'permissions' => ['goosy.marketplaceclient.*'],
                    ],
                    'Authors'         => [
                        'label'       => 'Authors',
                        'icon'        => 'icon-user',
                        'url'         => Backend::url('goosy/blog/authors'),
                        'description' => 'All created authors.',
                        'permissions' => ['goosy.marketplaceclient.*'],
                    ],
                    'Categories'      => [
                        'label'       => 'Categories',
                        'icon'        => 'icon-folder-open',
                        'url'         => Backend::url('goosy/blog/categories'),
                        'description' => 'All created categories.',
                        'permissions' => ['goosy.marketplaceclient.*'],
                    ],
                    'Tags'      => [
                        'label'       => 'Tags',
                        'icon'        => 'icon-hashtag',
                        'url'         => Backend::url('goosy/blog/tags'),
                        'description' => 'All created tags.',
                        'permissions' => ['goosy.marketplaceclient.*'],
                    ],
                ]
            ],
        ];
    }
}

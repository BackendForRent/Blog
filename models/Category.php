<?php namespace Goosy\Blog\Models;

use October\Rain\Database\Model;
use System\Models\File;

/**
 * Category Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'goosy_blog_categories';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'is_published',
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'title'        => 'required',
        'slug'         => [
            'required',
            'regex:/(?!^\d+$)^[_A-z0-9\-]*$/',
            'unique:goosy_blog_categories,slug',
        ],
        'is_published' => 'boolean',
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [
        'deleted_at',
    ];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'blogs'       => Blog::class,
        'blogs_count' => Blog::class, 'count' => true
    ];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'image' => File::class
    ];
    public $attachMany = [];

    public function getTotalViewsAttribute()
    {
        $blogs = Blog::where('category_id', $this->id)->get();
        $totalViews = 0;

        foreach ($blogs as $blog) {
            $totalViews += $blog->views;
        }
        return $totalViews;
    }

    public function scopeIsPublished($query)
    {
        return $query->where('is_published', true);
    }
}

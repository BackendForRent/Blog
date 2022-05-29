<?php namespace Goosy\Blog\Models;

use System\Models\File;
use October\Rain\Database\Model;

/**
 * Blog Model
 */
class Blog extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'goosy_blog_blogs';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'title',
        'content_preview',
        'content',
        'is_published',
        'views',
        'slug',
        'image',
    ];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'title'        => 'required',
        'content'      => 'required',
        'views'        => 'required',
        'author'       => 'required',
        'slug'         => [
            'required',
            'regex:/(?!^\d+$)^[_A-z0-9\-]*$/',
            'unique:goosy_blog_blogs,slug',
        ],
        'image'        => 'image|nullable',
        'is_published' => 'boolean',
    ];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [
        'is_published' => 'boolean'
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
    public $hasMany = [];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [
        'author'   => Author::class,
        'category' => Category::class
    ];
    public $belongsToMany = [
        'tags' => [
            Tag::class,
            'table' => 'goosy_blog_blogs_tags'
        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'image' => File::class
    ];
    public $attachMany = [];

    public function scopeIsPublished($query)
    {
        return $query->where('is_published', true);
    }
}

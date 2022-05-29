<?php namespace Goosy\Blog\Models;

use October\Rain\Database\Model;

/**
 * Tag Model
 */
class Tag extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'goosy_blog_tags';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [
        'title'        => 'required',
        'slug'         => 'required',
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
        'blog'        => Blog::class,
        'blogs_count' => Blog::class, 'count' => true
    ];
    public $hasOneThrough = [];
    public $hasManyThrough = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'blogs' => [
            Blog::class,
            'table' => 'goosy_blog_blogs_tags'
        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function scopeIsPublished($query)
    {
        return $query->where('is_published', true);
    }
}

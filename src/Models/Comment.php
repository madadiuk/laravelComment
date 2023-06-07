<?php
namespace Imanborumand\LaravelComments\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Imanborumand\LaravelComments\Contracts\CommentInterface;



class Comment extends Model implements CommentInterface
{
    use SoftDeletes;

    protected $table  = 'comments';

    protected $fillable = [
      'user_id',
      'parent_id',
      'is_approved',
      'commentable',
      'content'
    ];


    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(static::class, 'parent_id');
    }


    /**
     * @return BelongsTo
     */
    public function parent() : BelongsTo
    {
        return $this->belongsTo(static::class, 'parent_id', 'id');
    }


    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(config('laravel_comment.user_model'), 'user_id');
    }


    /**
     * @return MorphTo
     */
    public function commentable() : MorphTo
    {
        return $this->morphTo();
    }
}

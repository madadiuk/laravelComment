<?php
namespace Imanborumand\LaravelComments\Traits;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Imanborumand\LaravelComments\Contracts\CommentInterface;
use Illuminate\Support\Facades\Auth;

trait HasComment
{

    /**
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(config('laravel_comment.model'), 'commentable');
    }


    /**
     * store comment
     * example $post->comment('this is a test')
     *
     * @param string                $content
     * @param Model|null            $user
     * @param CommentInterface|null $parent
     * @return CommentInterface
     */
    public function storeComment( string $content, Model $user = null, CommentInterface $parent = null): CommentInterface
    {
        return $this->comments()->create([
             'content' => $content,
             'is_approved' => false,
             'user_id' => $user ? $user->getKey() : Auth::id(),
             'parent_id' => $parent?->getKey(),
         ]);
    }

}

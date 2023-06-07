<?php
namespace Imanborumand\LaravelComments\Contracts;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

interface CommentInterface
{
    public function children() : HasMany;
    public function parent() : BelongsTo;
    public function user() : BelongsTo;
    public function commentable(): MorphTo;

}

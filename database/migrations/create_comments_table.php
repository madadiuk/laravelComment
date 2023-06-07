<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->boolean('is_approved')->default(false)->index();
            $table->morphs('commentable');
            $table->string('content', (int) config('laravel_comment.max_length_content'));
            $table->timestamps();
            $table->softDeletes();
        });
    }
};

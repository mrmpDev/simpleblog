<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['approvedReplies'];

    protected $fillable = [
        'content',
        'is_approved',
        'user_id',
        'comment_id',
        'post_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function getCreatedAtInJalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class);
    }

    public function approvedReplies()
    {
        return $this->replies()->where('is_approved', true);
    }

    public function getStatusInFarsi()
    {
        return !!$this->is_approved ? 'تایید شده' : 'تایید نشده';
    }
}

<?php

namespace App;

use App\Presenters\MessagePresenter;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['nombre', 'email', 'mensaje','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function note()
    {
        return $this->morphOne(Note::class, 'notable');
    }

    public function present()
    {
        return new MessagePresenter($this);
    }
}

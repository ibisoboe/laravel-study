<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model {

    protected $table = 'posts';

    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = ['id','user_id', 'title', 'body'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    }



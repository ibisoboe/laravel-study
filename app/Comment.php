<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comments';

    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = ['id','post_id','name', 'comment',];

    }



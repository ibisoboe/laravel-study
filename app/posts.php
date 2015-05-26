<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model {

    protected $table = 'posts';

    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = ['name', 'title', 'mainbody'];

}

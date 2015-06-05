<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = 'profiles';

    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = ['id', 'user_id', 'image_path', 'profile', 'familyname', 'firstname', 'birthday', 'gender', 'street_address',];

}

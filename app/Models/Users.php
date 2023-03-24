<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';//nếu tên table là books -> không cần
    protected $primaryKey ='email';//Nếu khóa là id -> không cần
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;//Nếu có 2 cột: created_at, updated_at-> kg cần

    protected $fillable = [
        'usename',
        'password',
        'email',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';//nếu tên table là books -> không cần
    protected $primaryKey ='id';//Nếu khóa là id -> không cần
    protected $keyType = 'int';
    public $incrementing = false;
    public $timestamps = false;//Nếu có 2 cột: created_at, updated_at-> kg cần

    protected $fillable = [
        'id',
        'name',
    ];
}

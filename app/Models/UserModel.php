<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_tbl';
    protected $primaryKey = 'user_ID';
    protected $fillable = ['first_name', 'last_name', 'gender', 'birthday', 'monthly_salary', 'email', 'password'];
}

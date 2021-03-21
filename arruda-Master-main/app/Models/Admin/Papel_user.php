<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papel_user extends Model
{
    protected $table = "papel_user";

    protected $fillable = ['user_id','papel_id'];
    public $timestamps = false;
}

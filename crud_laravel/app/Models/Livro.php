<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $dates = ["anoPublicacao"];
    protected $guarded = [];
}

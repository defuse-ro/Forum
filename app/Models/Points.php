<?php

namespace App\Models;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Points extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'score'];
}

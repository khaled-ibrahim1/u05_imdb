<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MlistMovie extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'mlist_movie';
    protected $primaryKey = 'mlist_id';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalenderStudent extends Model
{
    use HasFactory;
    protected $table = 'events';
    public $primaryKey = 'id';
    protected $fillable = [
        'title', 'start', 'end'
    ];
}

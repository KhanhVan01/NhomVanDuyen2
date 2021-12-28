<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkAverage extends Model
{
    use HasFactory;
    protected $table='mark_average';
    public $timestamps = false;
    public $primaryKey = 'number';
    protected $fillable = [
        'number',
        'classCode',
        'studentCode',
        'mark_average',
    ];
}

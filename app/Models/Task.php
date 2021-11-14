<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'content',
      'deadline',
      'importance',
      'completion_flg',
      'created_by',
      'updated_by',
      'status'
    ];

    protected $table = 'tasks';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    use HasFactory;

    protected $fillable=[
        'student_name',
        'student_id',
        'programme',
        'student_contact',
        'status',
        'resume'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
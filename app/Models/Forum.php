<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{

    use HasFactory;
    protected $fillable=[
        'forums_title',
        'forums_content',
        'student_id'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

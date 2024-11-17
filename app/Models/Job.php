<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    use HasFactory;

    protected $fillable=[
        'category',
        'company_name',
        'location',
        'position',
        'allowance',
        'contact',
        'others',
        'job_status'

    ];

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'description',
        'position',
        'type',
        'city',
        'salary',
        'deadline',
        'conditions',
    ];

    public function job_applications(){
        return $this->belongsToMany(JobApplication::class, 'job_applications');
    }
    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
}

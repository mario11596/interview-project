<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'status',
    ];

    public function job(){
        return $this->hasOne(Job::class, 'job_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'user_id');
    }
}

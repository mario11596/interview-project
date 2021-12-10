<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'city',
        'number_employees',
        'type',
        'email',
        'password'
    ];

    public function job(){
        return $this->hasMany(Job::class, 'job_id');
    }
    public function users(){
        return $this->belongsToMany(User::class, 'users_companies');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $primaryKey = 'candidate_id';

    protected $fillable = [
       'name',
       'email_id',
       'surname',
       'address',
       'city',
       'mobile_number',
       'status_type',
       'OIB'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'email_id');
    }
}

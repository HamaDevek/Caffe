<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    protected $fillable = ['from','to','employee','username','day'];
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee','employee');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','username');
    }

}

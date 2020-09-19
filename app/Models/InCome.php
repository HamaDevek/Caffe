<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InCome extends Model
{
    use HasFactory;
    protected $fillable = ['income','username','updated_by'];
    public function user()
    {
        return $this->belongsTo('App\Models\User','username');
    }
    public function updatedby()
    {
        return $this->belongsTo('App\Models\User','updated_by');
    }
}

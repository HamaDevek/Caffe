<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','salary','time','username','state'];
    public function license()
    {
        return $this->hasMany('App\Models\License','employee')->orderBy('id','DESC');
    }
  
    public function salary()
    {
        return $this->hasMany('App\Models\Salary','employee');
    }

}

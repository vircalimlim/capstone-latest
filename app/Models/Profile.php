<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function work(){
      return $this->hasOne(Work::class);
    }
    
    public function student(){
      return $this->hasOne(Student::class);
    }
    
    public function blood(){
      return $this->hasMany(Blood::class);
    }
}

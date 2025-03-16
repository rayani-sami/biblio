<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    public function section(){
        return $this->belongsTo('App\Models\Section','section_id')->select('id','name');
        }
    public function parentniveau(){
            return $this->belongsTo('App\Models\Niveau','parent_id')->select('id','niveau_name');
     }

     public function subNiveau(){
        return $this->hasMany('App\Models\Niveau','parent_id')->where('status', 1);
        }

}

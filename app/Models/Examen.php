<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    public function section(){

     return $this->belongsTo('App\Models\Section', 'section_id');

   }
   public function niveau(){
    return $this->belongsTo('App\Models\Niveau', 'niveau_id');
    }
}

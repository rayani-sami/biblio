<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo('App\Models\User','user_id');
        }
        public function section(){

            return $this->belongsTo('App\Models\Section', 'section_id');

          }
          public function niveau(){
           return $this->belongsTo('App\Models\Niveau', 'niveau_id');
           }
}

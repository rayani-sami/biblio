<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable ;
class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard ='admin';

    public function enseignant (){
        return $this->belongsTo('App\Models\Enseignant','enseignant_id');
    }
    public function enseignantprofessionel (){
        return $this->belongsTo('App\Models\EnseignantProffessionel','enseignant_id');
    }
}

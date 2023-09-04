<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enseignant extends Model
{
    protected $fillable= ["firstname", "lastname", "tel", "adresse"];

   protected $table ="enseignants";

   use SoftDeletes;

   public function affectationEn(){
    return $this->hasManyThrough(Cours::class, affectationProf::class, 'enseignants_id','id','id','cours_id');
   }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributionEtudiant extends Model
{
    protected $fillable= ["students_id", "cours_id"];

   protected $table ="affectation_students";

  
}


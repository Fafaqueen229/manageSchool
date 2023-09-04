<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffectationProf extends Model
{
    protected $fillable= ["enseignants_id", "cours_id"];

    protected $table ="affectation_prof";
    use SoftDeletes;
 
}

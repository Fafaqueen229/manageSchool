<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cours extends Model
{

    protected $fillable= ["nom_cours", "masse_horaire", "coef", "addBy", "deleted_at", "category_id"];

   protected $table ="cours";

   use SoftDeletes;
}

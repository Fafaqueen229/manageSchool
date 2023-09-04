<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;
    protected $fillable=['id','lastname','firstname', 'dateofbirth','picture','hobbies', 'speciality','bio'];
    protected $table= "students";
}


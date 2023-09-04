<?php 
use App\Models\Student;
    if (!function_exists("idsDB")) {
        function idsDB() {
            $id=Student::pluck("id");
            return $id;
        }
    }
   

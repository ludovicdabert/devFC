<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   // relation One to Many une catégorie on chercher tous les robots
   public function robots(){
       return $this->hasMany(Robot::class);
   }
}

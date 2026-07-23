<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;

class Category extends Model
{
    use Translatable;
    public function getTranslatableAttributes(): array
    {
        return ['name', 'description'];
    }
    protected $fillable = ["name","slug","description","status"];
    public function products(){
        return $this->hasMany(Product::class); 
    }
}

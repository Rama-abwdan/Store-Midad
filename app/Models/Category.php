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
    public function translatedName(?string $locale = null): string
    {
        return $this->getTranslation('name', $locale) ?? $this->name;
    }

    /**
     * اختصار لجلب وصف التصنيف المترجم.
     *
     * @example
     * // $category->translatedDescription('en') => "Men's clothing category"
     */
    public function translatedDescription(?string $locale = null): string
    {
        return $this->getTranslation('description', $locale) ?? $this->description;
    }
    protected $fillable = ["name", "slug", "description", "status"];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

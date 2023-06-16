<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lagu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'images',
        'deskripsi'
    ];

    /**
     * The categories that belong to the Lagu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'musik_category', 'lagu_id', 'category_id');
    }
}

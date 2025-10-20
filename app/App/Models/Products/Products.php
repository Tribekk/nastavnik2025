<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $napr
 * @property string $potr
 * @property string $name
 * @property string $org
 */
class Products extends Model {
    
    protected $fillable = ['name' => 'array', 'napr', 'potr', 'god', 'content', 'org', 'loc', 'sity' => 'array', 'scul' => 'array', 'id'];
}

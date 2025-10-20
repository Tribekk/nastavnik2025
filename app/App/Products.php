<?php

namespace App\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $name
 * @property string $content
 */
class Products extends Model {

     protected $fillable = ['name', 'napr', 'potr', 'god', 'content', 'org', 'loc', 'sity', 'scul', ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CharacterComic extends Pivot
{
    use HasFactory;

    protected $table = 'character_comic';
    public $timestamps = false;
}

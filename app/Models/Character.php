<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CharacterComic;
use App\Models\Comic;

class Character extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function comics()
    {
        return $this->belongsToMany(Comic::class)->using(CharacterComic::class);
    }
}

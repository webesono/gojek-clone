<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryHelp extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function helps(){
        return $this->hasMany(Help::class, 'CategoryHelp_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}

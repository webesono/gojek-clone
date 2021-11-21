<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryHelp extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function helps(){
        return $this->hasMany(Help::class, 'CategoryHelp_id');
    }
}

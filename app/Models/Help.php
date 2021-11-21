<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;
    
    //hanya id yg gk boleh diubah-ubah
    protected $guarded = ['id'];

    //supaya gk berulang-ulang panggil
    protected $with =['categoryHelp'];


    public function categoryHelp(){
        return $this->belongsTo(CategoryHelp::class, 'categoryHelp_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

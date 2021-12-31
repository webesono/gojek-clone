<?php

namespace App\Models;

use App\Models\CategoryHelp;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Help extends Model
{
    use HasFactory;
    use Sluggable;
    
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
                'source' => 'judul'
            ]
        ];
    }
//     public function uncategorized(){
//     CategoryHelp::deleting(function ($categoryHelp){
//         $recipe_ids = $categoryHelp->recipes->pluck('id');
//         Recipe::whereIn('id', $recipe_ids)->update(['categoryHelp_id =>1']);
//     });
// }
}

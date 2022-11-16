<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    // this will apture the tag from the controller filter(request(['tag']))
    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            // sql like query
            $query->where('tags', 'like', '%'.$filters['tag'].'%');
        }
        //searching filter 
        if($filters['search'] ?? false){
            // sql like query
            $query->where('title', 'like', '%'.$filters['search'].'%')
            ->orWhere('description', 'like', '%'.$filters['search'].'%')
            ->orWhere('tags', 'like', '%'.$filters['search'].'%');
        }
    }
}

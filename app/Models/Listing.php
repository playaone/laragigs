<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'tags', 'logo', 'company', 'email', 'website', 'description', 'location'];

    public function scopeFilter($query, array $filters){

        if($filters['tag'] ?? false){
            $query->where("tags", "like", "%" . request('tag') ."%");
        }
        if($filters['search'] ?? false){
            $query->where("tags", "like", "%" . request('search') ."%")
            ->orWhere("title", "like", "%" . request('search') ."%")
            ->orWhere("location", "like", "%" . request('search') ."%")
            ->orWhere("description", "like", "%" . request('search') ."%");
        }

        return $query;
    }
}

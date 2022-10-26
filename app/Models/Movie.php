<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ["category"];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters["search"] ?? false,
            fn ($query, $search) => $query->where(
                fn ($query) => $query
                    ->where("title", "like", "%" . $search . "%")
                    ->orWhere("body", "like", "%" . $search . "%")
            )
        );
        $query->when(
            $filters["category"] ?? false,
            fn ($query, $category) => $query->whereHas(
                "category",
                fn ($query) => $query->where("slug", $category)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function watchlists()
    {
        return $this->hasMany(Watchlist::class);
    }
    
    public function mlists()
    {
        return $this->belongsToMany(Mlist::class);
    }
}

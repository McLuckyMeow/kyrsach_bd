<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'description',
        'weight',
        'image',
        'old_price',
    ];

    protected $appends = ['image_url'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'basket');
    }

    public function basket()
    {
        return $this->hasMany(Basket::class, 'product_id');
    }

    public function reviews()
    {
        return $this->belongsToMany(User::class, 'feedbacks', 'user_id');
    }

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}

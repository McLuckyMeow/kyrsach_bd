<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'count',
        'is_buy'
    ];

    protected $table = "basket";

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public  function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;


    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $fillable = [
        'total',
        'pay',
        'balance'
    ];

    public function sales_details()
    {
        return $this->hasMany(SalesDetails::class, 'sales_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id');
    }


}

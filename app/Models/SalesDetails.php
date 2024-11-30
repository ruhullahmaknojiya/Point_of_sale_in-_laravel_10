<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    use HasFactory;

    protected $table = 'sales_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'sales_id',
        'product_id',
        'price',
        'qty',
        'total_cost'
    ];

    public function sales()
    {
        return $this->hasMany(SalesDetails::class, 'sales_id');
    }

    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
}

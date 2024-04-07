<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable= [
        'orderNo' ,
        'itemNo' ,
        'quantity'    
    ];
    public function Item()
    {
       return $this->belongsTo(Item::class,'itemNo','id');
    }

    protected $appends=['total'];

    public function getTotalAttribute()
    {
        return $this->quantity * $this->Item->price;
    }

    public function decrease()
    {
        $this->product->update([
            'qunatityInStock'=> $this->product->qunatityInStock - $this->qty
        ]);
    }
}

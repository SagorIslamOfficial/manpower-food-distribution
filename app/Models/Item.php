<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity_per_person'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'menu_items');
    }

    public function days()
    {
        return $this->belongsToMany(Day::class, 'menu_items');
    }
}

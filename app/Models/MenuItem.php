<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = ['menu_id', 'item_id', 'time_id', 'day_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}

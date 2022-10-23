<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cubaista;


class Country extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'cubaista_id',
        'name'
    ];
           


    public function cubaista()
    {
        return $this->belongsTo(Cubaista::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Cubaista extends Model
{
    use HasFactory;

    protected $table = "cubaista";

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'website',
        'company_name',
        'additional_notes'
    ];

    
    public function countries()
    {
        return $this->hasMany(Country::class);
    }

}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $primaryKey = 'region_id';
    protected $fillable = 'region_name';

    public function countries()
    {
         return $this->hasMany(Country::class, 'region_id');
    }

}

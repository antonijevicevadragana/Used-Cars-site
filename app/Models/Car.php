<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'brend',
        'model',
        'mileage',
        'engineDisplacement',
        'AvgFuelConsumption',
        'year',
        'category',
        'city',
        'fuel',
        'transmission',
        'NumberOfDoors',
        'NumberOfSeats',
        'airCondition',
        'color',
        'registration',
        'demage',
        'fixPrice',
        'price',
        'descript',
        'cover_img',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'car_id');
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

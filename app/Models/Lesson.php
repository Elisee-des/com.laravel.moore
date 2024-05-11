<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'point',
        'totalMotMoore',
        'status',
    ];

    public function motMoores()
    {
        return $this->hasMany(MotMoore::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // public function motMoore()
    // {
    //     return $this->hasOne(MotMoore::class);
    // }

    // public function motMooreSingulier()
    // {
    //     return $this->hasOneThrough(
    //         MotMooreSingulier::class,
    //         MotMoore::class,
    //         'lesson_id',
    //         'id',
    //         'id',
    //         'motmooresingulier_id'
    //     );
    // }

    // public function motMoorePluriel()
    // {
    //     return $this->hasOneThrough(
    //         MotMoorePluriel::class,
    //         MotMoore::class,
    //         'lesson_id',
    //         'id',
    //         'id',
    //         'motmoorepluriel_id'
    //     );
    // }
}

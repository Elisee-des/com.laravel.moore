<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motmoorepluriel extends Model
{
    use HasFactory;
    protected $table = 'motmoorepluriels';

    protected $fillable = [
        'mot_en_fr',
        'mot_en_moore',
        'suffixe',
        'image',
        'description',
        'exemple',
    ];

    public function motMoore()
    {
        return $this->hasOne(MotMoore::class, 'motmoorepluriel_id');
    }

     // Exemple d'accesseur pour obtenir le mot en français
     public function getMotEnFrAttribute($value)
     {
         return ucfirst($value); // Par exemple, renvoie le mot en français avec la première lettre en majuscule
     }

     public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}

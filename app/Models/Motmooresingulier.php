<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motmooresingulier extends Model
{
    use HasFactory;
    protected $table = 'motmooresinguliers';


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
        return $this->hasOne(MotMoore::class, 'motmooresingulier_id');
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

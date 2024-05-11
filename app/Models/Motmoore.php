<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motmoore extends Model
{
    use HasFactory;

        protected $fillable = [
        'lesson_id',
        'motmooresingulier_id',
        'motmoorepluriel_id',
        'numero',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($motMoore) {
            $latestNumero = self::where('lesson_id', $motMoore->lesson_id)->max('numero');
            $motMoore->numero = '' . ($latestNumero ? ++$latestNumero : 1);
        });
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function singulier()
    {
        return $this->belongsTo(MotMooreSingulier::class, 'motmooresingulier_id');
    }

    public function pluriel()
    {
        return $this->belongsTo(MotMoorePluriel::class, 'motmoorepluriel_id');
    }
}

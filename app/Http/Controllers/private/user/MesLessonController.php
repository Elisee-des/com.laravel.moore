<?php

namespace App\Http\Controllers\private\user; 

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class MesLessonController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur actuel
        $user = auth()->user(); // Si vous utilisez l'authentification Laravel

        // Récupérer les leçons attachées à l'utilisateur
        $lessons_en_attentes = $user->lessons()->get();

        return view('private.user.mesLessons.index', compact('lessons_en_attentes'));
    }

    public function deselectionAction($idLesson)
    {
        // Récupérer l'utilisateur actuel
        $user = auth()->user(); // Si vous utilisez l'authentification Laravel
        
        // Trouver la leçon
        $lesson = Lesson::find($idLesson);
    
        // Vérifier si la leçon existe et si l'utilisateur est attaché à cette leçon
        if ($lesson && $user->lessons->contains($lesson)) {
            // Détacher l'utilisateur de la leçon
            $user->lessons()->detach($lesson);
            
            // Pas besoin d'appeler $user->save() car la méthode detach() gère automatiquement la mise à jour de la relation
            
            return redirect()->back()->with('success', "La leçon a été retirée avec succès. Retrouvez-la dans la section 'Sélectionner des leçons'.");
        } else {
            return redirect()->back()->with('error', "La leçon n'est pas attachée à cet utilisateur.");
        }
    }

    public function apprentissageLesson($idLesson)
    {
        $lesson = Lesson::find($idLesson);
        return view('private.user.mesLessons.apprentissageLesson',[
            "lesson" => $lesson
        ]);
    }
    
}

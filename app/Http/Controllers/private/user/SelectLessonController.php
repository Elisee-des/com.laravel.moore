<?php

namespace App\Http\Controllers\private\user;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class SelectLessonController extends Controller
{
        public function index(Request $request)
        {
            // Récupérer l'utilisateur actuel
            $user = auth()->user(); // Si vous utilisez l'authentification Laravel
        
            $lessons = Lesson::query();
        
            // Récupérer les leçons qui ne sont pas attachées à l'utilisateur
            $lessons->whereDoesntHave('users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        
            if ($recherche = $request->recherche_lessons_user) {
                $lessons->where('nom', 'like', '%' . $recherche . '%');
            }
        
            $lessons = $lessons->orderBy('created_at', 'asc')->paginate(2, ['*'], 'pageLesson');
        
            return view('private.user.selectLesson.index', compact('lessons'));
    }

public function selectionAction(Request $request)
{
    // Récupérer l'utilisateur actuel
    $user = auth()->user(); // Si vous utilisez l'authentification Laravel
    
    // Récupérer les leçons sélectionnées
    $lessonsSelected = $request->input('lessons');

    // Attacher l'utilisateur à chaque leçon sélectionnée
    foreach ($lessonsSelected as $lessonId) {
        // Trouver la leçon
        $lesson = Lesson::find($lessonId);
        
        // Vérifier si la leçon existe et si l'utilisateur n'est pas déjà attaché
        if ($lesson && !$user->lessons->contains($lesson)) {
            // Attacher l'utilisateur à la leçon
            $user->lessons()->attach($lesson);
        }
    }

    return redirect()->back()->with('success', "Les lessons ont été enregistré dans la section 'Mes lessons! Amusez-vous !!!'");
}

}

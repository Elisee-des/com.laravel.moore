<?php

namespace App\Http\Controllers\private\admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Motmoore;
use App\Models\Motmoorepluriel;
use App\Models\Motmooresingulier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::orderBy('created_at', 'asc')->get();
        return view('private.admin.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('private.admin.lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nom' => 'required|min:6|unique:lessons',
            ],
            [
                'nom.required' => 'Le champ nom est requis.',
                'nom.min' => 'Le nom de la lesson doit contenir au moins :min caractères.',
                'nom.unique' => 'Ce nom est déjà utilisée.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $lesson = Lesson::create([
            "nom" => $request->nom
        ]);

        return redirect()->route('lessons.index')->with('success', 'Lesson creé avec succès !');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lesson = Lesson::find($id);
        // $motsMoores = $lesson->motMoores;

        return view('private.admin.lesson.show', [
            "lesson" => $lesson,
            // "motMoore" => $motMoore,
            // "motSingulier" => $motSingulier,
            // "motPluriel" => $motPluriel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lesson = Lesson::find($id);
        
        if(!$lesson)
        {
            return redirect()->back()->with('error', "Echec d'edition de la lesson !");
        }

        return view('private.admin.lesson.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $validator = Validator::make(
                $request->all(),
                [
                    'nom' => 'required|min:6|unique:lessons',
                ],
                [
                    'nom.required' => 'Le champ nom est requis.',
                    'nom.min' => 'Le nom de la lesson doit contenir au moins :min caractères.',
                    'nom.unique' => 'Ce nom est déjà utilisée.',
                ]
            );
    
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
           
            $lesson = Lesson::find($id);

            if(!$lesson)
            {
                return redirect()->back()->with('error', 'Echec de la modification de la lesson !');
            }


            $lesson->nom = $request->nom;
            $lesson->save();

            return redirect()->route('lessons.index')->with('success', 'Lesson modifiée avec succès !');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();

        return redirect()->route('lessons.index')
         ->with('success', 'Lesson supprimer avec succès.');
    }

    public function ajoutMotMoore($idLesson)
    {
        $lesson = Lesson::find($idLesson);

        return view('private.admin.lesson.ajoutMotMoore', ["lesson" => $lesson]);
    }

    public function ajoutMotMooreAction(Request $request, $idLesson)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'mot_en_fr_singulier' => 'required',
                'mot_en_moore_singulier' => 'required',
                'mot_en_fr_pluriel' => 'required',
                'mot_en_moore_pluriel' => 'required',
            ],
            [
                'mot_en_fr_singulier.required' => 'Le champ mot français en singluier est requis.',
                'mot_en_moore_singulier.required' => 'Le champ mot moore en singluier est requis.',
                'mot_en_fr_pluriel.required' => 'Le champ mot français au pluriel est requis.',
                'mot_en_moore_pluriel.required' => 'Le champ mot moore au pluriel est requis.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        //Creation du singulier
        $motmooresigluier = Motmooresingulier::create([
            'mot_en_fr' => $request->mot_en_fr_singulier,
            'mot_en_moore' => $request->mot_en_moore_singulier,
            'suffixe' => $request->suffixe_singulier,
            'exemple' => $request->exemple_singulier,
            'description' => $request->description_singulier,
        ]);
        $motmooresigluier->save();

        //Creation du pluriel
        $motmoorepluriel = Motmoorepluriel::create([
            'mot_en_fr' => $request->mot_en_fr_pluriel,
            'mot_en_moore' => $request->mot_en_moore_pluriel,
            'suffixe' => $request->suffixe_pluriel,
            'exemple' => $request->exemple_pluriel,
            'description' => $request->description_pluriel,
        ]);



        $motmoorepluriel->save();

        //Creation du motmoore
        $lesson = Lesson::find($idLesson);
        $motmoore = Motmoore::create([
            'lesson_id' => $lesson->id,
            'motmooresingulier_id' => $motmooresigluier->id,
            'motmoorepluriel_id' => $motmoorepluriel->id,
        ]);

        $lesson->totalMotMoore = $lesson->totalMotMoore + 1;
        $lesson->point = $lesson->point + 5;
        $lesson->save();

        $motmoore->save();

        return redirect()->route('lessons.show', ["lesson" => $idLesson])
        ->with('success', 'Exercice ajouté avec succès !!!');
    }

    public function editMotMoore($idMotMoore)
    {
        $motmoore = Motmoore::find($idMotMoore);
        return view('private.admin.lesson.editMotMoore', compact('motmoore'));
    }

    public function editMotMooreAction(Request $request, $idMotMoore)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'mot_en_fr_singulier' => 'required',
                'mot_en_moore_singulier' => 'required',
                'mot_en_fr_pluriel' => 'required',
                'mot_en_moore_pluriel' => 'required',
            ],
            [
                'mot_en_fr_singulier.required' => 'Le champ mot français en singluier est requis.',
                'mot_en_moore_singulier.required' => 'Le champ mot moore en singluier est requis.',
                'mot_en_fr_pluriel.required' => 'Le champ mot français au pluriel est requis.',
                'mot_en_moore_pluriel.required' => 'Le champ mot moore au pluriel est requis.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        //Creation du singulier
        $motmooresigluier = Motmooresingulier::create([
            'mot_en_fr' => $request->mot_en_fr_singulier,
            'mot_en_moore' => $request->mot_en_moore_singulier,
            'suffixe' => $request->suffixe_singulier,
            'exemple' => $request->exemple_singulier,
            'description' => $request->description_singulier,
        ]);

        $motmoore = Motmoore::find($idMotMoore);

        $idLesson = $motmoore->lesson->id;
        $lesson = Lesson::find($idLesson);
        $singulier = $motmoore->singulier;
        $pluriel = $motmoore->pluriel;

        $singulier->update([
            'mot_en_fr' => $request->mot_en_fr_singulier,
            'mot_en_moore' => $request->mot_en_moore_singulier,
            'suffixe' => $request->suffixe_singulier,
            'exemple' => $request->exemple_singulier,
            'description' => $request->description_singulier,
        ]);

        $pluriel->update([
            'mot_en_fr' => $request->mot_en_fr_pluriel,
            'mot_en_moore' => $request->mot_en_moore_pluriel,
            'suffixe' => $request->suffixe_pluriel,
            'exemple' => $request->exemple_pluriel,
            'description' => $request->description_pluriel,
        ]);

        $singulier->save();
        $pluriel->save();
       
        return redirect()->route('lessons.show', ["lesson" => $lesson])
        ->with('success', 'Exercice ajouté avec succès !!!');
    }

    public function deletetMotMooreAction($idMotMoore)
    {
        $motmoore = Motmoore::findOrFail($idMotMoore);
        $idLesson = $motmoore->lesson->id;
        $lesson = Lesson::find($idLesson);
        $lesson->totalMotMoore = $lesson->totalMotMoore - 1;
        $lesson->point = $lesson->point - 5;
        $lesson->save();
        $motmoore->delete();

        return redirect()->route('lessons.show', ["lesson" => $lesson])
         ->with('success', 'Mot mooré supprimer avec succès.');
    }
}

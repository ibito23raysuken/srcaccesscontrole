<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Utilities\EnseignantManager;
use App\Http\Requests\EnseignantRequest;

class EnseignantController extends Controller
{
    private $enseignantManager;

    public function __construct(EnseignantManager $enseignantManager){
         $this->enseignantManager = $enseignantManager;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enseignants=Enseignant::paginate('20');
        return view('enseignant.index',[
            'enseignants'=>$enseignants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('enseignant.ajoutEnseignant');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnseignantRequest $request)
    {
        $enseignant=new Enseignant();
        $validate=$request->validated();
        $this->enseignantManager->build($enseignant,$request);
        return redirect()->route('enseignants.index')->with('success',"l'enseignant a ete enregistrer");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

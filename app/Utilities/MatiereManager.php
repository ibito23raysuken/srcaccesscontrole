<?php
namespace App\Utilities;

use App\Models\Matiere;
use App\Http\Requests\MatiereRequest;


class MatiereManager{
    public function build(Matiere $matiere,MatiereRequest $request){
        $matiere->nom_matiere=$request->input('nom_matiere');
        $matiere->jour=$request->input('jour');
        $matiere->heures=$request->input('heures');
        $matiere->enseignant=$request->input('enseignant');
        $matiere->save();
    }
}
?>

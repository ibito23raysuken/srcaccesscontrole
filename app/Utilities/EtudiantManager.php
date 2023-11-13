<?php
namespace App\Utilities;

use App\Models\Etudiant;
use App\Http\Requests\EtudiantRequest;


class EtudiantManager{
    public function build(Etudiant $etudiant,EtudiantRequest $request){

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $textpourqrcode=$request->nom.$request->parcoure;

        $etudiant->nom=$request->input('nom');
        $etudiant->prenom=$request->input('prenom');
        $etudiant->sexe=$request->input('sexe');
        $etudiant->datedenaissance=$request->input('birth_day');
        $etudiant->lieudenaissance=$request->input('lieudenaissance');
        $etudiant->ref_qrcode=$textpourqrcode;
        $etudiant->imagepath=$imageName;
        $etudiant->parcoure=$request->input('parcoure');
        $etudiant->Anneedetude=$request->input('Annedetude');
        $etudiant->save();
    }
}
?>

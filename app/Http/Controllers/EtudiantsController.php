<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Utilities\EtudiantManager;
use Illuminate\Support\Facades\File;
use App\Http\Requests\EtudiantRequest;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EtudiantsController extends Controller
{
    private $etudiantManager;

    public function __construct(EtudiantManager $etudiantManager){
        $this->etudiantManager = $etudiantManager;

   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants=Etudiant::paginate('20');
        return view('etudiant.index',[
            'etudiants'=>$etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etudiant.creation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EtudiantRequest $request)
    {
        $etudiant=new Etudiant();
        $validate=$request->validated();
        $this->etudiantManager->build($etudiant,$request);
        $qrcode = QrCode::size(200)->generate($etudiant->ref_qrcode);
        $imagepath=$etudiant->imagepath;
        session()->flash('success', 'La carte étudiant est enregistrée ');
        return view('etudiant.carte',[
            'etudiantinfo'=>$request,
            'imagepath'=>$imagepath,
            'qrcode'=>$qrcode]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        $qrcode = QrCode::size(200)->generate($etudiant->ref_qrcode);
        return view('etudiant.show_carte',[
            'etudiant'=>$etudiant,
            'qrcode'=>$qrcode]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $qrcode = QrCode::size(200)->generate($etudiant->ref_qrcode);
        return view('etudiant.edit',[
            'etudiant'=>$etudiant,
            'qrcode'=>$qrcode
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EtudiantRequest $etudiantRequest, Etudiant $etudiant)
    {
        $validate=$etudiantRequest->validated();
        $this->etudiantManager->build($etudiant,$etudiantRequest);
        $qrcode = QrCode::size(200)->generate($etudiant->ref_qrcode);
        $imagepath=$etudiant->imagepath;
        session()->flash('success', 'La carte étudiant est modifier ');
        return view('etudiant.carte',[
            'etudiantinfo'=>$etudiantRequest,
            'imagepath'=>$imagepath,
            'qrcode'=>$qrcode]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $image_path = public_path()."/images/".$etudiant->imagepath;
        if (file_exists($image_path)) {
                File::delete($image_path);
        }
        $etudiant->delete();
        return redirect()->route('etudiants.index')->with('success',"letudiant a etet bien effacer deletet");
    }
}

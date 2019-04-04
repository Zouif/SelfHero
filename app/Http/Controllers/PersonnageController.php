<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Personnage;
use App\Histoire;
use App\DetailHistoire;
use App\Sauvegarde;

class PersonnageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $histoireDao = new HistoireDao();
//        $histoires = $histoireDao->selectProjetAndRefClientByIdUser(auth()->id());
//
//        return view('histoires.index', compact('histoires'));


        $histoire = Histoire::all()->Where('id_ref_','=', session()->get('id_ref_histoire'));

        return view('histoire.index', compact('histoire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$id = $request->get('id');

        return view('personnage.create')->with('id_ref_histoire', session()->get('id_ref_histoire'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //auth()->id()
        $this->validate($request, [
            'nom_personnage'=>'required',
        ]);

        $personnage = new personnage([
            'nom_personnage'=> $request->get('nom_personnage')
        ]);
        $personnage->save();

        $detailhistoire = DB::table('detail_histoire')->Where([
            ['id_ref_histoire', '=', session()->get('id_ref_histoire')],
            ['numero_page', '=', 1]
        ]);
        $detailhistoire = $detailhistoire->get();

        $sauvegarde = new sauvegarde([
            'id_user' => auth()->id(),
            'id_detail_histoire' => $detailhistoire[0]->id_detail_histoire,
            'id_personnage' => $personnage->getAttribute('id_personnage')
        ]);
        $sauvegarde->save();

        session()->put('sauvegarde', $sauvegarde);

        session()->put('id_ref_histoire', session()->get('id_ref_histoire'));

        return redirect('/histoire');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_refhistoire
     * @return \Illuminate\Http\Response
     */
    public function show($id_ref_histoire)
    {
        session()->put('id_ref_histoire', $id_ref_histoire);

        $sauvegarde = DB::table('sauvegarde')
            ->join('detail_histoire', 'detail_histoire.id_detail_histoire', '=', 'sauvegarde.id_detail_histoire')
            ->Where('detail_histoire.id_ref_histoire', '=', $id_ref_histoire)
            ->get();

        if($sauvegarde->first()){
            session()->put('sauvegarde', $sauvegarde);
            return redirect('/histoire');
        }

        return redirect('/personnage/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_refhistoire
     * @return \Illuminate\Http\Response
     */
    public function edit($id_refhistoire)
    {

        $refhistoire = refhistoire::find($id_refhistoire);

        return view('refhistoires.edit', compact('refhistoire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_histoire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_refhistoire)
    {
        $request->validate([
            'nom_refhistoire'=>'required',
            'date_refrefhistoire'=>'required'
        ]);

        $refhistoire = refhistoire::find($id_refhistoire);
        $refhistoire->nom_refhistoire = $request->get('nom_refhistoire');
        $refhistoire->date_refhistoire = $request->get('date_refhistoire');
        $refhistoire->save();

        return redirect('/refhistoires')->with('success', 'Le histoire a été mis a jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_refhistoire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_refhistoire)
    {
        $refhistoire = refhistoire::find($id_refhistoire);
        $refhistoire->delete();

        return redirect('/refhistoires')->with('success', 'Un histoire a été supprimé');
    }
}

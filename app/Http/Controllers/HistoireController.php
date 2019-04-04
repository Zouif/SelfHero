<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\RefHistoire;
use App\DetailHistoire;
use App\Sauvegarde;

class HistoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailhistoire = DB::table('detail_histoire')
            ->Where('id_detail_histoire', '=', session()->get('sauvegarde')->id_detail_histoire);
        $detailhistoire = $detailhistoire->get();

        $json = json_decode($detailhistoire[0]->contenue);

        $json->texte = preg_replace("/\\n/", "\n", $json->texte);

        return view('histoire.index', compact('json'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_refhistoire
     * @return \Illuminate\Http\Response
     */
    public function show($id_ref_histoire)
    {
        return redirect('/histoire')->with('id_ref_histoire', $id_ref_histoire);
    }

    public function nextPage(Request $request){

        $detailhistoire = DB::table('detail_histoire')
            ->Where([
                ['id_ref_histoire', '=', session()->get('id_ref_histoire')],
                ['numero_page', '=', $request->numero_page]
            ]);
        $detailhistoire = $detailhistoire->get();

        $sauvegarde = sauvegarde::find(session()->get('sauvegarde')->id_sauvegarde);
        $sauvegarde->id_detail_histoire = $detailhistoire[0]->id_detail_histoire;
        $sauvegarde->save();

        session()->put('sauvegarde', $sauvegarde);

        return redirect('/histoire');
    }

    public function checkSauvegarde(Request $request)
    {
        session()->get('id_ref_histoire', $request->id_ref_histoire);

        $sauvegarde = DB::table('sauvegarde')
            ->join('detail_histoire', 'detail_histoire.id_detail_histoire', '=', 'sauvegarde.id_detail_histoire')
            ->Where('detail_histoire.id_ref_histoire', '=', $request->id_ref_histoire)
            ->get();

        if($sauvegarde->first()){
            $sauvegarde = sauvegarde::find($sauvegarde[0]->id_sauvegarde);

            session()->put('sauvegarde', $sauvegarde);
            return redirect('/histoire');
        }

        return redirect('/personnage/create');
    }
}

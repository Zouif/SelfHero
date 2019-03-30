<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\RefHistoire;

class RefHistoireController extends Controller
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


        $refhistoires = RefHistoire::all();

        return view('refhistoires.index', compact('refhistoires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$id = $request->get('id');

        return view('refhistoires.create');
    }


    public function search(Request $request)
    {
        //dd($request->all());

        $search = $request->get('search');

        $refhistoires = DB::table('refhistoire')->join('client', 'client.id_client', '=', 'refhistoire.id_client')
            ->Where(
                [
                    ['id_user', '=', auth()->id()],
                    ['id_refhistoire', 'like', '%' . $search . '%'],
                    ['client.archive', '=', false]
                ])
            ->orWhere(
                [
                    ['id_user', '=', auth()->id()],
                    ['ref_client', 'like', '%' . $search . '%'],
                    ['client.archive', '=', false]
                ])
            ->orWhere(
                [
                    ['id_user', '=', auth()->id()],
                    ['id_user', 'like', '%' . $search . '%'],
                    ['client.archive', '=', false]
                ])
            ->orWhere(
                [
                    ['id_user', '=', auth()->id()],
                    ['nom_refhistoire', 'like', '%' . $search . '%'],
                    ['client.archive', '=', false]
                ])
            ->orWhere(
                [
                    ['id_user', '=', auth()->id()],
                    ['date_refhistoire', 'like', '%' . $search . '%'],
                    ['client.archive', '=', false]
                ])
            ->orWhere(
                [
                    ['id_user', '=', auth()->id()],
                    ['ref_refhistoire', 'like', '%' . $search . '%'],
                    ['client.archive', '=', false]
                ]);
        $refhistoires = $refhistoires->get();
        return view('refhistoires.index', ['refhistoires' => $refhistoires]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'ref_client'=>'required',
            'nom_histoire'=>'required'

        ]);

        $clients = DB::table('client')->where('ref_client', '=', $request->get('ref_client'));
        $clients = $clients->get();

        $refhistoire = new refhistoire([
            'id_client' => $clients[0]->id_client,
            'id_user'=> auth()->id(),
            'nom_refhistoire'=> $request->get('nom_refhistoire'),
            'date_refhistoire' => Carbon::now()->toDateTimeString(),
            'ref_refhistoire'=> str_random(5)
        ]);
        $refhistoire->save();
        return redirect('/refhistoires')->with('success', 'Un refhistoire a été rajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_refhistoire
     * @return \Illuminate\Http\Response
     */
    public function show($id_client)
    {

        return redirect('/refhistoires/create')->with('id', $id_client);

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

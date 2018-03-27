<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonce = Annonce::paginate(5);
        return view('home', ['annonce' => $annonce]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Annonce::create([
            'user_id' => Auth::id(),
            'titre' => request('titre'),
            'description' => request('description'),
            'prix' => request('prix'),
        ]);
        return redirect('home')->with('message', 'Annonce créée avec succès!');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $annonce = Annonce::where(request('id', $id));
        $annonce->update([
            'titre' => request('titre'),
            'description' => request('description'),
            'prix' => request('prix'),
        ]);
        return redirect()->back()->with('message', 'Annonce mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annonce = Annonce::find(request('id'));
        $annonce->delete();
        return redirect()->back()->with('message', 'Annonce supprimée avec succès');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Annonce;
use PhotoController;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonce = Annonce::latest()->paginate(4);
        return view('annonce', ['annonce' => $annonce]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'prix' => 'required|float',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',

        ]);
        dd(request('photo'));
        Annonce::create([
            'user_id' => Auth::id(),
            'titre' => request('titre'),
            'description' => request('description'),
            'prix' => request('prix'),
            'photo' => request('photo'),
    ]);
        return redirect('annonce');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annonce = Annonce::find($id);
        return view('annonce-id', compact('annonce'));
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
        $annonce = Annonce::where('id', $id);
        $annonce->update([
            'id' => request('id'),
            'user_id' => Auth::id(),
            'titre' => request('titre'),
            'description' => request('description'),
            'prix' => request('prix'),
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $annonce = Annonce::find(request('id'));
        $annonce->delete();
        return redirect()->back();
    }
}

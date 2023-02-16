<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comicList = Comic::all();
        return view('comics.index', compact('comicList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required|string|min:2|max:255',
            'description' => 'required|min:10',
            'thumb' => 'required|url|min:10',
            'price' => 'required|numeric',
            'series' => 'required|string|min:2|max:255',
            'sale_date' => 'required|date',
            'type' => 'required|string|min:2|max:60',
        ],
        [
            'title.required' => 'inserisci un Titolo',
            'title.min' => 'il Titolo deve essere di almeno 2 caratteri',
            'title.max' => 'il Titolo deve essere di massimo 255 caratteri',
            'description.required' => 'inserisci una Descrizione',
            'description.min' => 'la Descrizione deve essere di almeno 10 caratteri',
            'thumb.required' => 'inserisci una Thumbnail',
            'thumb.url' => 'inserisci un URL corretto nella Thumbnail',
            'thumb.min' => 'inserisci un URL di almeno 10 caratteri',
            'price.required' => 'inserisci un Prezzo',
            'price.numeric' => 'il Prezzo deve essere composto da valori Numerici',
            'series.required' => 'inserisci una Serie',
            'series.min' => 'la Serie deve essere di almeno 2 caratteri',
            'series.max' => 'la Serie deve essere di massimo 255 caratteri',
            'sale_date.required' => 'inserisci una Data di uscita',
            'sale_date.date' => 'la Data di uscita deve essere una data',
            'type.required' => 'Inserisci un Tipo di fumetto',
            'type.min' => 'il Tipo di fumetto deve essere di almeno 2 caratteri',
            'type.max' => 'il Tipo di fumetto deve essere di massimo 255 caratteri'   
        ]
    );
        $newComic = new Comic();
        $newComic->fill($data);
        $newComic->save();
        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singleComic = Comic::findOrFail($id);
        return view('comics.show', compact('singleComic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
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
        $data = $request->all();
        $comic = Comic::findOrFail($id);
        $comic->update($data);
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
//use Storage;
use File;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::orderBy('nombre')->paginate(5);
        return view('marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
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
            'nombre' => 'required',
            'imagen' => 'nullable|mimetypes:image/jpeg,image/png,image/bmp,image/gif'
        ]);
        if ($request->has('imagen')) {
            $file = $request->imagen;
            //echo $file;
            //die();
            $id = time();
            $nombre = $id . "-" . $file->getClientOriginalName();
            $cadena = 'img/marcas/' . $nombre;
            Storage::disk('local')->put('marcas/' . $nombre, File::get($file));
            //$request['imagen']=$cadena;
        } else {
            $cadena = 'img/marcas/generica.jpeg';
        }
        $marca = new Marca;
        $marca->nombre = $request['nombre'];
        $marca->imagen = $cadena;
        $marca->save();

        // Marca::create($request->all());
        Session::flash('message', 'Marca Guardada.');
        return redirect()->route('marcas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        return view('marcas.show', compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'nullable|mimetypes:image/jpeg,image/png,image/bmp,image/gif'
        ]);
        if ($request->has('imagen')) {
            $file = $request->imagen;
            //echo $file;
            //die();
            $id = time();
            $nombre = $id . "-" . $file->getClientOriginalName();
            $cadena = 'img/marcas/' . $nombre;
            Storage::disk('local')->put('marcas/' . $nombre, File::get($file));
            //borro la imagen anterior
            $nombre = basename($marca->imagen);
            Storage::disk('local')->delete('marcas/' . $nombre);
        }
        else $cadena=$marca->imagen;
        $marca->nombre=$request['nombre'];
        $marca->imagen=$cadena;
        $marca->save();
        Session::flash('message', 'Marca actualizada correctamente!');
        return redirect()->route('marcas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        if (basename($marca->imagen) != 'generica.jpeg') {
            $nombre = basename($marca->imagen);
            Storage::disk('local')->delete('marcas/' . $nombre);
        }
        $marca->delete();
        Session::flash('message', 'Marca Borradoa Correctamente'); //hay que declarar Session arriba
        return redirect()->route('marcas.index');
    }
}

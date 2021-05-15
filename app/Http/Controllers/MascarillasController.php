<?php

namespace App\Http\Controllers;

use App\Models\mascarillas;
use Spatie\Dropbox\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MascarillasController extends Controller
{

    public function __construct()
    {
        // Necesitamos obtener una instancia de la clase Client la cual tiene algunos métodos
        // que serán necesarios.
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    public function index(){
         // Obtenemos todos los registros de la tabla files
        // y retornamos la vista files con los datos.
        $files = mascarillas::orderBy('created_at')->get();
        
        return view('welcome', compact('files'));
    }

    public function agregar(Request $request)
    {
        Storage::disk('dropbox')->putFileAs(
            '/',
            $request->file('file'),
            $request->file('file')->getClientOriginalName()
        );

        $response = $this->dropbox->createSharedLinkWithSettings(
            $request->file('file')->getClientOriginalName(),
            ["requested_visibility" => "public"]
        );

        mascarillas::create([
            'nombre' => $response['name'],
            'url' => str_replace('www.dropbox.com','dl.dropboxusercontent.com',$response['url'])
        ]);

        
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use File;
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
        
        return back();
    }
}

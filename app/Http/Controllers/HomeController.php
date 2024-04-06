<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marker;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'GIS',
            'markers' => Marker::all(),
            'isi' => 'v_home'
        ];
        return view('home', $data);
    }

    public function marker()
    {
        $data = [
            'title' => 'Data Marker',
            'markers' => Marker::all(),
            'isi' => 'v_marker'
        ];
        return view('datamarker', $data);
    }

    public function edit($id)
    {
        $marker = Marker::findOrFail($id);
        return view('edit', compact('marker'));
    }

    public function addMarker(Request $request)
    {
        $data = [
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'Keterangan' => $request->input('Keterangan'),
            'kategori' => $request->input('kategori')
        ];
        Marker::create($data);
        return redirect()->route('home.index');
    }

    public function editMarker(Request $request, $id)
    {
        $marker = Marker::find($id);
        if ($marker) {
            $data = [
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'Keterangan' => $request->input('Keterangan'),
                'kategori' => $request->input('kategori')
            ];
            $marker->update($data);
        }
        return redirect()->route('marker');
    }

    public function deleteMarker($id)
    {
        $marker = Marker::find($id);
        if ($marker) {
            $marker->delete();
        }
        return redirect()->route('home.index');
    }

    public function searchMarker(Request $request){
        $Keterangan = $request->input('Keterangan');
        $markers = Marker::where('Keterangan', 'like', "%$Keterangan%")->get();

        return response()->json($markers);
    }
}

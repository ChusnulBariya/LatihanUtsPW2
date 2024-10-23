<?php

namespace App\Http\Controllers;

use App\Models\Kucing;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class KucingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kucing = Kucing::all();
        $data['message'] = true;
        $data['result'] = $kucing;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis' => 'required'

        ]);

        $result = Kucing::create($validate); // simpan ke tabel ku$kucing
        if ($result) {
            $data['success'] = true;
            $data['message'] = "Data kucing berhasil disimpan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kucing $kucing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kucing $kucing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'umur' => 'required|numeric',
            'jenis' => 'required'

        ]);

        $result = Kucing::where('id', $id)->update($validate);
        if ($result) {
            $data['success'] = true;
            $data['message'] = "Data kucing berhasil disimpan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kucing = Kucing::find($id);
        if($kucing){
            $kucing->delete();
            $data['success'] = true;
            $data['message'] = 'Data Fakultas Berhasil Dihapus';
            return response()->json($data, Response::HTTP_OK);
        } else {
            $data['success'] = false;
            $data['message'] = 'Data Fakultas Tidak Ada';
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}

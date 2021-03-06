<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class SiswaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if($request->get('search')){
            $siswa = Siswa::where("nama", "LIKE", "%{$request->get('search')}%")
                ->paginate(2);      
        }else{
		  $siswa = Siswa::paginate(2);
        }
        return response($siswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $siswa = new Siswa;

        $siswa->nis = $request->input('nis');
        $siswa->nama = $request->input('nama');
        $siswa->jurusan = $request->input('jurusan');

        $siswa->save();

        return response('Success', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $siswa = new Siswa;
        return $siswa->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $siswa = new Siswa;

        $siswa->where('id', $id)->update([
            'nis' => $request->input('nis'),
            'nama' => $request->input('nama'),
            'jurusan' => $request->input('jurusan')
        ]);

        return response('Success', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Siswa::destroy($id);

        return response('Success', 200);
    }

}

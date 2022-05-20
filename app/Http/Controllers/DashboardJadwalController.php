<?php

namespace App\Http\Controllers;
use App\Models\Peserta;
use App\Models\Jadwal;

use Illuminate\Http\Request;

class DashboardJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = Peserta::find(1);
        return view('dashboardJadwal',[
            'title'=> 'Jadwal',
            'jadwal'=>Jadwal::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peserta = Peserta::find(1);
        return view('formJadwal',[
            'title'=> 'Jadwal',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'namaJadwal'=>'required|max:255',
            'tanggalJadwal'=>'required',
            'waktuJadwal'=>'required',
            'levelJadwal'=>'required',
            'typeJadwal'=>'required'
        ]);

        Jadwal::create($validatedData);
        
        return redirect('/dashboard/jadwal')->with('success','Jadwal Baru Ditambahkan');
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
        $jadwal = Jadwal::find($id);
        return view('editJadwal',[
            'title'=> 'Jadwal',
            'jadwal'=>$jadwal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $validatedData =$request->validate([
            'namaJadwal'=>'required|max:255',
            'tanggalJadwal'=>'required',
            'waktuJadwal'=>'required',
            'levelJadwal'=>'required',
            'typeJadwal'=>'required'
        ]);
        Jadwal::where('id',$jadwal->id)->update($validatedData);
        
        return redirect('/dashboard/jadwal')->with('success','Jadwal Baru Ditambahkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        Jadwal::destroy($jadwal->id);
        
        return redirect('/dashboard/jadwal')->with('success','Jadwal terhapus');
    }
}
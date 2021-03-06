<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {

        $rulesUser =[
            'name'=>'required|max:255',
            'image'=> 'image|file'
        ];
        $rulesPeserta=[
            'posisi'=>'required',
            'levelpemain'=>'required',
            'umur'=>'required'
        ];
        $rulesPendaftaran=[
            'alamat'=>'required',
        ];
        

        $validatedUser = $request->validate($rulesUser);
        $validatedPeserta = $request->validate($rulesPeserta);
        $validatedPendaftaran = $request->validate($rulesPendaftaran);
        
        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedUser['image']=$request->file('image')->store('user-images');
        }
        
        User::where('id',$User->id)->update($validatedUser);
        Peserta::where('id',$User->Peserta->id)->update($validatedPeserta);
        
        Pendaftaran::where('id',$User->Peserta->pendaftaran_id)->update($validatedPeserta);

        return redirect()->back()->with('success','Artikel telah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }
}

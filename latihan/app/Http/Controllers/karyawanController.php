<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\karyawan;
use Illuminate\Support\Facades\DB;
use Validator;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan=karyawan::orderBy('no','ASC')->paginate(5);
        return view('pages.karyawan',compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.createkaryawan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'nama' => 'required',
          'jenis_kelamin' => 'required',
          'jabatan' => 'required',
          'no_hp' => 'required',
          'alamat' => 'required'
      ]);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator);
        }else{
        $karyawan=new karyawan();
        $karyawan->nama=$request->nama;
        $karyawan->jenis_kelamin=$request->jenis_kelamin;
        $karyawan->jabatan=$request->jabatan;
        $karyawan->no_hp=$request->no_hp;
        $karyawan->alamat=$request->alamat;
        $karyawan->save();
        return redirect('karyawan');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $search=$request->search;
      $karyawan=karyawan::where('nama', 'LIKE', '%'. $search .'%')
      ->orwhere('jenis_kelamin', 'LIKE', '%'. $search .'%')
      ->orwhere('jabatan', 'LIKE', '%'. $search .'%')
      ->orwhere('no_hp', 'LIKE', '%'. $search .'%')
      ->orwhere('alamat', 'LIKE', '%'. $search .'%')
      ->orderBy('no','ASC')->paginate(5);
      return view('pages.karyawan',compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan=karyawan::where('no', '=', $id)->first();
        return view('pages.editkaryawan',compact('karyawan'));
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
      $validator = Validator::make($request->all(), [
          'nama' => 'required',
          'jenis_kelamin' => 'required',
          'jabatan' => 'required',
          'no_hp' => 'required',
          'alamat' => 'required'
      ]);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator);
        }else{
          DB::table('karyawan')
                ->where('no', $id)
                ->update([
                  'nama' => $request->nama,
                  'jenis_kelamin' => $request->jenis_kelamin,
                  'jabatan' => $request->jabatan,
                  'no_hp' => $request->no_hp,
                  'alamat' => $request->alamat
                ]);
          return redirect('karyawan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('karyawan')->where('no', '=', $id)->delete();
      return redirect('karyawan');
    }
}

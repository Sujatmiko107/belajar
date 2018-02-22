<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\karyawan;
use App\Model\kehadiran;
use Illuminate\Support\Facades\DB;
use Validator;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $kehadiran=kehadiran::join('karyawan','karyawan.no','=','kehadiran.karyawan_no')->select('kehadiran.*','karyawan.nama',DB::raw("TIMEDIFF(kehadiran.jam_pulang,kehadiran.jam_datang)AS jam_kerja"))->orderBy('kehadiran.no','ASC')->paginate(5);
      return view('pages.dashboard',compact('kehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan=karyawan::all();
        return view('pages.createkehadiran',compact('karyawan'));
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
          'karyawan_no' => 'required',
          'hari_tanggal' => 'required',
          'jam_datang' => 'required',
          'jam_pulang' => 'required'
      ]);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator);
        }else{
        $kehadiran=new kehadiran();
        $hari_tanggal=$this->convertDate($request->hari_tanggal);
        $kehadiran->karyawan_no=$request->karyawan_no;
        $kehadiran->hari_tanggal=$hari_tanggal;
        $kehadiran->jam_datang=$request->jam_datang;
        $kehadiran->jam_pulang=$request->jam_pulang;
        $kehadiran->save();
        return redirect('/');
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
      $kehadiran=kehadiran::join('karyawan','karyawan.no','=','kehadiran.karyawan_no')->select('kehadiran.*','karyawan.nama',DB::raw("TIMEDIFF(kehadiran.jam_pulang,kehadiran.jam_datang)AS jam_kerja"))
      ->where('karyawan.nama', 'LIKE', '%'. $search .'%')
      ->orwhere('kehadiran.hari_tanggal', 'LIKE', '%'. $search .'%')
      ->orwhere('kehadiran.jam_datang', 'LIKE', '%'. $search .'%')
      ->orwhere('kehadiran.jam_pulang', 'LIKE', '%'. $search .'%')
      ->orderBy('kehadiran.no','ASC')->paginate(5);
      return view('pages.dashboard',compact('kehadiran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan=karyawan::all();
        $kehadiran=kehadiran::where('no','=',$id)->first();
        return view('pages.editkehadiran',compact('kehadiran','karyawan'));
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
          'karyawan_no' => 'required',
          'hari_tanggal' => 'required',
          'jam_datang' => 'required',
          'jam_pulang' => 'required'
      ]);
      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator);
        }else{
      $hari_tanggal=$this->convertDate($request->hari_tanggal);
      DB::table('kehadiran')
            ->where('no', $id)
            ->update([
              'karyawan_no' => $request->karyawan_no,
              'hari_tanggal' => $hari_tanggal,
              'jam_datang' => $request->jam_datang,
              'jam_pulang' => $request->jam_pulang
            ]);
      return redirect('/');
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
        DB::table('kehadiran')->where('no', '=', $id)->delete();
        return redirect('/');
    }

    public function convertDate($date)
    {
      $day = date('D', strtotime($date));
      $dayList = array(
      	'Sun' => 'Minggu',
      	'Mon' => 'Senin',
      	'Tue' => 'Selasa',
      	'Wed' => 'Rabu',
      	'Thu' => 'Kamis',
      	'Fri' => 'Jumat',
      	'Sat' => 'Sabtu'
      );
      $monList = array(
      	'01' => 'Januari',
      	'02' => 'Februari',
      	'03' => 'Maret',
      	'04' => 'April',
      	'05' => 'Mei',
      	'06' => 'Juni',
      	'07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
      );
      $hari=$dayList[$day];
      $date=explode('-',$date);
      $bulan=$monList[$date[1]];
      $hasil=$hari .','. $date[2] .' '. $bulan .' '. $date[0];
      return $hasil;
    }
}

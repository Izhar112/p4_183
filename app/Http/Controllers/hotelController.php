<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Hotel;
use App\Models\Pengunjung;
use App\Models\User;

class PraktikumController extends Controller
{
    public function hotel(){
        $hotel = hotel::get();
        return view ('hotel0183',['hotel'=> $hotel]);
    }
    public function kamar(){
        $data = DB::table('kamar')->select(DB::raw('kamar.id,hotel.nama as nama_hotel, pengunjung.hotel as nama_pengunjung, alamat'))->join('pengunjung','kamar.id_pengunjung','pengunjung.id')->join('hotel','kamar.id_hotel','hotel.id')->get();
        // dd($data->all());
        return view ('kamar0183',['kamar'=>$data]);
    }
    public function pengunjung(){
        $data = Pengunjung::get();
        // dd($data->all());
        return view ('pengunjung0183',['pengunjung'=>$data]);
    }
    public function user(){
        $data = User::get();
        // dd($data->all());
        return view ('user0183',['user'=>$data]);
    }
    public function user_update(request $request){
        // $data = User::where('id',$request->id)->fir;
        DB::table('user')->where('id',$request->id)->update([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'password'=>$request->password,
        ]);
        // dd($data->all());
        return redirect('/user');
    }
    public function user_edit($id){
        $data = User::where('id',$id)->get();
        // dd($data->all());
        return view ('update_user0183',['user'=>$data]);
    }
    public function kamar_filter(Request $request){
        $data = $data = DB::table('kamar')
        ->select(DB::raw('kamar.id,hotel.nama as nama_hotel, pengunjung.nama as nama_pengunjung, alamat'))
        ->join('pengunjung','kamar.id_pengunjung','pengunjung.id')
        ->join('hotel','kamar.id_hotel','hotel.id')
        ->where('alamat',$request->alamat)->get();
        // dd($data->all());
        return view ('kamar0182',['kamar'=>$data]);
    }
    public function hotel_filter(Request $request){
        // dd($request->all());
        $hotel = hotel::where('bintang',$request->bintang)->get();
        return view ('hotel0183',['hotel'=> $hotel]);
    }

    public function tambah_pengunjung(Request $request){
        DB::table('pengunjung')->insert([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
        ]);
        return redirect('/pengunjung');
    }
   public function generate()
{
$pengunjung = \App\Models\pengunjung::All();
$pdf =
PDF::loadview('pengunjung_pdf',['pengunjung'=>$pengunjung]);
return $pdf->stream();
}
    
}

<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use App\Ruang;
use App\Studio;
use App\Notifikasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudioController extends Controller
{

    public function index(Request $request)
    {
        if(Auth::check()){
            $id = Auth::user()->id;
            $notif = Notifikasi::all()
            ->where('id_user',$id)
            ->where('status',0)
            ->count();
            $url = $request->session()->put('url','/');
            $studio = Studio::all();
            return view('user/index',compact('studio','notif'));
        }else{
            $url = $request->session()->put('url','/');
            $studio = Studio::all();
            return view('user/index',compact('studio'));
        }
    }
    public function detail(Ruang $ruang, Request $request)
    {
        if(Auth::check()){
            $idUser = Auth::user()->id;
            $id = $ruang->id;
            $notif = Notifikasi::all()
            ->where('id_user',$idUser)
            ->where('status',0)
            ->count();
            $url = $request->session()->put('url','studio/'.$id);
            $request->session()->put('url',"studio/".$id);
            $data = DB::table('ruangs')
            ->join('studios','ruangs.id_studio','=','studios.id')
            ->join('mitras','mitras.id','=','studios.id_mitra')
            ->select('studios.address','studios.open','studios.closed','studios.phone','mitras.nama as nama_mitra','studios.name as nama_studio','studios.id as id_studio','ruangs.*')
            ->where('ruangs.id',$id)
            ->get();
            return view('user.detailStudio',compact('data','notif'));
        }else{
            $id = $ruang->id;
            $url = $request->session()->put('url','studio/'.$id);
            $request->session()->put('url',"studio/".$id);
            $data = DB::table('ruangs')
            ->join('studios','ruangs.id_studio','=','studios.id')
            ->join('mitras','mitras.id','=','studios.id_mitra')
            ->select('studios.address','studios.open','studios.closed','studios.phone','mitras.nama as nama_mitra','studios.name as nama_studio','studios.id as id_studio','ruangs.*')
            ->where('ruangs.id',$id)
            ->get();
            return view('user.detailStudio',compact('data'));
        }
    }

    public function booking(Request $request)
    {
        $request->validate([
            'band' => 'required',
            'tanggal' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]);

        $mulai =  strtotime($request->mulai);
        $akhir = strtotime($request->selesai);
        $total = $akhir-$mulai;
        $jam   = ($total / (60 * 60));
        if($jam<0){
            $angka = $jam*-1;
        }else{
            $angka =$jam;
        }
        $harga = $angka*$request->harga;
        if (Auth::check()){
            $id = Auth::id();
            $data = new Pemesanan();
            $data->id_user = $id;
            $data->id_ruangan = $request->id_ruang;
            $data->kode = 0;
            $data->nama_band = $request->band;
            $data->waktu_main = $request->mulai;
            $data->waktu_selesai = $request->selesai;
            $data->waktu_total = $angka;
            $data->tanggal_main = $request->tanggal;
            $data->harga = $harga;
            $data->status = 0;
            $data->save();

            $idTransaksi = $data->id;
            $request->session()->put('idPesanan',$idTransaksi);
            return redirect('transaksi-booking');
        }else{
            $url = $request->session()->put('url','studio/'.$request->id_ruang);
            return back()->with(['danger' => 'Anda harus login terlebih dahulu!']);
        }
    }

    public function search(Request $request)
    {
        $url = $request->session()->put('url','/search');
        $kota = $request->kota;
        // dd($kota);
        $jenis = $request->jenis;
        $studio = Studio::all();
        $provinsi = DB::table('wilayah_provinsi')->get();
        $data = DB::table('ruangs')
        ->join('studios','ruangs.id_studio','=','studios.id')
        ->join('mitras','mitras.id','=','studios.id_mitra')
        ->select('studios.address','mitras.nama as nama_mitra','studios.name as nama_studio','studios.id as id_studio','ruangs.*')
        ->where('ruangs.kategori','LIKE', "%{$jenis}%")
        ->Where('studios.kota','LIKE', "%{$kota}%")
        ->get();
        if($data){
            return view('user.search',compact('data','provinsi','studio'));
        }else{
            return view('user.search','provinsi')->with(['success' => 'Add Studio is Success']);
        }
    }

    public function searchKatalog(Request $request)
    {
        $katalog = $request->katalog;
        $kota = $request->kota;
        $url = $request->session()->put('url','/search');
        $request->session()->put('katalog',$katalog);
        $request->session()->put('kota',$kota);
        if($katalog==1){
            $jenis = $request->jenis;
        $studio = Studio::all();
        $provinsi = DB::table('wilayah_provinsi')->get();
        $data = DB::table('ruangs')
        ->join('studios','ruangs.id_studio','=','studios.id')
        ->join('mitras','mitras.id','=','studios.id_mitra')
        ->select('studios.address','mitras.nama as nama_mitra','studios.name as nama_studio','studios.id as id_studio','ruangs.*')
        ->Where('studios.kota','LIKE', "%{$kota}%")
        ->get();
            return view('user.search',compact('data','provinsi','studio','katalog','kota'));
        }else{
        $jenis = $request->jenis;
        $studio = Studio::all();
        $provinsi = DB::table('wilayah_provinsi')->get();
        $data = DB::table('ruangs')
        ->join('studios','ruangs.id_studio','=','studios.id')
        ->join('mitras','mitras.id','=','studios.id_mitra')
        ->select('studios.address','mitras.nama as nama_mitra','studios.name as nama_studio','studios.id as id_studio','ruangs.*')
        ->where('ruangs.kategori','LIKE', "%{$katalog}%")
        ->Where('studios.kota','LIKE', "%{$kota}%")
        ->get();
            return view('user.search',compact('data','provinsi','studio','katalog','kota'));
        }
    }

    public function katalog(Request $request)
    {
        $nama = $request->nama;
        if($nama==1){
            $data = DB::table('ruangs')
        ->join('studios','ruangs.id_studio','=','studios.id')
        ->join('mitras','mitras.id','=','studios.id_mitra')
        ->select('studios.address','mitras.nama as nama_mitra','studios.name as nama_studio','studios.id as id_studio','ruangs.*')
        ->get();
        }else{
            $data = DB::table('ruangs')
        ->join('studios','ruangs.id_studio','=','studios.id')
        ->join('mitras','mitras.id','=','studios.id_mitra')
        ->select('studios.address','mitras.nama as nama_mitra','studios.name as nama_studio','studios.id as id_studio','ruangs.*')
        ->where('ruangs.kategori','LIKE', "%{$nama}%")
        ->get();
        }

        return response($data);
    }

}

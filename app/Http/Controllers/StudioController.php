<?php

namespace App\Http\Controllers;


use App\Mail\SendMail;
use App\Mitra;
use App\Pemesanan;
use App\Ruang;
use App\Studio;
use App\Notifikasi;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            $boking = Pemesanan::where('id_ruangan',$id)
            ->orderBy('tanggal_main','desc')->get();
            return view('user.detailStudio',compact('data','notif','boking'));
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
            $boking = Pemesanan::where('id_ruangan',$id)
            ->orderBy('tanggal_main','desc')->get();
            return view('user.detailStudio',compact('data','boking'));
        }
    }

    public function resetPass(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $data = Mitra::all()->where('email',$request->email);
        if($data->count()>0){
            foreach($data as $item){
                $customer_details = [
                    'nama' => $item->nama,
                    'email' => $item->email,
                    'password' => $item->password,
                ];
                $title = '[Forgot Password] Account studioku.spydercode.site';

                $sendmail = Mail::to($customer_details['email'])->send(new SendMail($title,$customer_details));
                if (empty($sendmail)) {
                    return back()->with(['success' => 'Pesan berhasil terkirim. Silahkan cek Email anda!']);
                    // return response()->json(['message' => 'Mail Sent Sucssfully'], 200);
                }else{
                    return back()->with(['danger' => 'Pesan gagal terkirim. Mohon ulangi beberapa saat lagi!']);
                    // return response()->json(['message' => 'Mail Sent fail'], 400);
                }
            }
        }else{
            return back()->with(['danger' => 'Email tersebut belum terdaftar. Mohon registrasi terlebih dahulu!']);
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
            $a =0;
            $b=0;
        $boking = Pemesanan::all()
        ->where('id_ruangan',$request->id_ruang)
        ->where('tanggal_main',$request->tanggal);
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
            if($boking->count()>0){
                foreach($boking  as $item){
                    if($mulai>=strtotime($item->waktu_main) && $mulai<strtotime($item->waktu_selesai)){
                        $a = $a +1;
                    }
                };
                if($a>0){
                    return back()->with(['waktu' => 'Waktu tersebut sudah dipesan band lain! Silahkan cek daftar booking terlebih dahulu']);
                }else{
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
                }
            }else{
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
            }

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

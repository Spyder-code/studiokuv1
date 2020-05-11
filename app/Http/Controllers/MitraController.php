<?php

namespace App\Http\Controllers;

use App\Mitra;
use App\Pemesanan;
use App\Ruang;
use App\Studio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MitraController extends Controller
{

    public function index()
    {
        return view('mitra.home');
    }

    public function login()
    {
        return view('mitra.login');
    }

    public function registrasi()
    {
        return view('mitra.registrasi');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|unique:mitras|max:255',
            'nama' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'nomor' => 'required|numeric',
        ]);

        $newUser = Mitra::create([
            'nama' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'nomor' => $request->phone,
            'image' => "default.jpg",
        ]);

        Auth::guard('mitra')->login($newUser);

        return redirect('/admin');

        // return back()->with(['success' => 'Registrasi berhasil']);
    }
    public function admin()
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $image = auth()->guard('mitra')->user()->image;
        $user = Mitra::all()->where('id',$id);
        return view('mitra/index',compact('nama','user','image'));
    }

    public function studio()
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $image = auth()->guard('mitra')->user()->image;
        $studio = Studio::all()->where('id_mitra',$id);
        $provinsi = DB::table('wilayah_provinsi')->get();
        return view('mitra.studio',compact('nama','image','studio','provinsi'));
    }

    public function provinsi(Request $request)
    {
        $id = $request->idProvinsi;
        $output ="";
        $data = DB::table('wilayah_kabupaten')
        ->where('provinsi_id',$id)
        ->get();
        if($data){
            foreach($data as $item){
                $output.=
                '<option value="'.$item->nama.'">'.$item->nama.'</option>';
            }
            return response($output);
        }else{
            return response($output);
        }

    }

    public function addStudio(Request $request)
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($files = $request->file('image')) {
            $destinationPath = public_path('image/' . $nama);
            $profileImage = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage);
            $insert['image'] = "$profileImage";

            $data = new Studio();
            $data->name = $request->nama;
            $data->id_mitra = $id;
            $data->address = $request->alamat;
            $data->provinsi = $request->provinsi;
            $data->kota = $request->kota;
            $data->phone = $request->phone;
            $data->open = $request->open;
            $data->closed = $request->closed;
            $data->image = "$profileImage";
            $data->description = $request->informasi;
            $data->save();

            return back()->with(['success' => 'Add Studio is Success']);
        }
    }

    public function ruangan(Studio $studio)
    {
        $image = auth()->guard('mitra')->user()->image;
        $nama = auth()->guard('mitra')->user()->nama;
        $id = $studio->id;
        $ruangan = Ruang::all()->where('id_studio',$id);
        return view('mitra.ruangan',compact('nama','id','image','ruangan'));
    }

    public function addRuangan(Request $request)
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($files = $request->file('image')) {
            $destinationPath = public_path('image/' . $nama);
            $profileImage = $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage);
            $insert['image'] = "$profileImage";

            $data = new Ruang();
            $data->id_studio = $request->idStudio;
            $data->nama = $request->nama;
            $data->kategori = $request->kategori;
            $data->harga = $request->harga;
            $data->image = "$profileImage";
            $data->fasilitas = $request->fasilitas;
            $data->status = 0;
            $data->save();

            return back()->with(['success' => 'Add Rooms is Success']);
        }
    }

    public function transaksi()
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $image = auth()->guard('mitra')->user()->image;
        return view('mitra.transaksi',compact('nama','image'));
    }

    public function jadwal()
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $image = auth()->guard('mitra')->user()->image;
        return view('mitra.jadwal',compact('nama','image'));
    }

    public function dataJadwal(){
        $id = auth()->guard('mitra')->user()->id;
        $pesanan = DB::table('pemesanans')
        ->join('users','users.id','=','pemesanans.id_user')
        ->join('ruangs','ruangs.id','=','pemesanans.id_ruangan')
        ->join('studios','studios.id','=','ruangs.id_studio')
        ->join('mitras','mitras.id','=','studios.id_mitra')
        ->select('users.name as nama_user','pemesanans.*','ruangs.nama as nama_ruangan','ruangs.image','mitras.nama as nama_mitra','ruangs.kategori')
        ->where('mitras.id',$id)
        ->get();
        return response($pesanan);
    }

    public function pending()
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $image = auth()->guard('mitra')->user()->image;
        return view('mitra.pendingPayment',compact('nama','image'));
    }

    public function accept()
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $image = auth()->guard('mitra')->user()->image;
        return view('mitra.acceptPayment',compact('nama','image'));
    }
}


<?php

namespace App\Http\Controllers;

use App\Mitra;
use App\Pemesanan;
use App\Ruang;
use App\Studio;
use App\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

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
            'name' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'phone' => 'required|numeric',
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

    public function changeImage(Request $request)
    {
        $id = Auth()->guard('mitra')->user()->id;
        $nama = auth()->guard('mitra')->user()->nama;
        $folderPath = public_path('image/'.$nama.'/');
        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->img == "default.jpg") {
            if ($files = $request->file('images')) {
                $destinationPath = public_path('image/'.$nama.'/');
                $profileImage =  $nama.".".$files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $insert['image'] = "$profileImage";
                Mitra::where('id', $id)->update([
                    'image' => "$profileImage"
                ]);
                return back()->with(['success' => 'Image berhasil diubah']);
            }
        }else {
            if (File::exists(public_path('image/'.$nama. '/' . $request->img))) {

                File::delete(public_path('image/'.$nama. '/' . $request->img));
            }
            if ($files = $request->file('images')) {
                $destinationPath = public_path('image/'.$nama.'/');
                $profileImage =  $nama.".".$files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $insert['image'] = "$profileImage";
                Mitra::where('id', $request->id)->update([
                    'image' => "$profileImage"
                ]);
                return back()->with(['success' => 'Image berhasil diubah']);
            }
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'pass1' => 'required',
            'pass2' => 'required'
        ]);
        $id = Auth()->guard('mitra')->user()->id;
        $pass = auth()->guard('mitra')->user()->password;
        if (Hash::check($request->pass1, $pass)) {
            Mitra::where('id', $id)->update([
                'password' => Hash::make($request->pass2)
            ]);
            return back()->with(['success' => 'Password berhasil diubah']);
        }
        return back()->with(['danger' => 'Wrong password']);
    }

    public function changeAlamat(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
        ]);
        $id = Auth()->guard('mitra')->user()->id;
            Mitra::where('id', $id)->update([
                'alamat' => $request->alamat
            ]);
            return back()->with(['success' => 'Data berhasil diubah']);
    }

    public function changeNomor(Request $request)
    {
        $request->validate([
            'nomor' => 'required|numeric'
        ]);
        $id = Auth()->guard('mitra')->user()->id;
            Mitra::where('id', $id)->update([
                'nomor' => $request->nomor
            ]);
            return back()->with(['success' => 'Data berhasil diubah']);
    }

    public function deleteStudio(Request $request)
    {
        $id = $request->idStudio;
            Studio::where('id', $id)->delete();
            return redirect('studio')->with(['success' => 'Data berhasil dihapus']);
    }

    public function hapusRuang(Request $request)
    {
        $id = $request->idRuang;
            Ruang::where('id', $id)->delete();
            return back()->with(['success' => 'Data berhasil dihapus']);
    }

    public function updateStudio(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric',
            'address' => 'required',
            'open' => 'required',
            'closed' => 'required',
            'description' => 'required',
            'namaStudio' => 'required',
        ]);
        $idStudio = $request->idStudio;
            Studio::where('id', $idStudio)->update([
                'phone' => $request->phone,
                'name' => $request->namaStudio,
                'address' => $request->address,
                'open' => $request->open,
                'closed' => $request->closed,
                'description' => $request->description,
            ]);
            return back()->with(['success' => 'Data berhasil diubah']);
    }

    public function updateRuang(Request $request)
    {
        $request->validate([
            'harga' => 'required|numeric',
            'nama' => 'required',
            'fasilitas' => 'required',
            'kategori' => 'required',
        ]);
        $idRuang = $request->idRuang;
            Ruang::where('id', $idRuang)->update([
                'harga' => $request->harga,
                'nama' => $request->nama,
                'fasilitas' => $request->fasilitas,
                'kategori' => $request->kategori,
            ]);
            return back()->with(['success' => 'Data berhasil diubah']);
    }

    public function studio()
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $image = auth()->guard('mitra')->user()->image;
        $studio = Studio::where('id_mitra',$id)->simplePaginate(1);
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
        $namaStudio = $studio->name;
        $ruangan = Ruang::where('id_studio',$id)->simplePaginate(2);
        return view('mitra.ruangan',compact('nama','id','image','ruangan','namaStudio'));
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
        $data = DB::table('pemesanans')
        ->join('users','users.id','=','pemesanans.id_user')
        ->join('ruangs','ruangs.id','=','pemesanans.id_ruangan')
        ->select('users.name','ruangs.nama as namaRuangan','pemesanans.*')
        ->orderBy('created_at', 'desc')->paginate(5);

        $dataPembayaran = DB::table('transaksis')
        ->join('pemesanans','pemesanans.id','=','transaksis.id_pemesanan')
        ->select('pemesanans.nama_band','transaksis.*')
        ->orderBy('created_at', 'desc')->paginate(5);

        return view('mitra.transaksi',compact('nama','image','data','dataPembayaran'));
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
        $data = DB::table('pemesanans')
        ->join('users','users.id','=','pemesanans.id_user')
        ->join('ruangs','ruangs.id','=','pemesanans.id_ruangan')
        ->select('users.name','ruangs.nama as namaRuangan','pemesanans.*')
        ->where('pemesanans.status',1)
        ->orderBy('created_at', 'desc')->paginate(5);
        return view('mitra.pendingPayment',compact('nama','image','data'));
    }

    public function accept()
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $image = auth()->guard('mitra')->user()->image;
        $data = DB::table('pemesanans')
        ->join('users','users.id','=','pemesanans.id_user')
        ->join('ruangs','ruangs.id','=','pemesanans.id_ruangan')
        ->select('users.name','ruangs.nama as namaRuangan','pemesanans.*')
        ->where('pemesanans.status',2)
        ->orderBy('created_at', 'desc')->paginate(5);
        return view('mitra.acceptPayment',compact('nama','image','data'));
    }

    public function kasir()
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $image = auth()->guard('mitra')->user()->image;
        $data = DB::table('pemesanans')
        ->join('users','users.id','=','pemesanans.id_user')
        ->join('ruangs','ruangs.id','=','pemesanans.id_ruangan')
        ->select('users.name','ruangs.nama as namaRuangan','pemesanans.*')
        ->where('pemesanans.status',1)
        ->orderBy('created_at', 'desc')->paginate(5);
        return view('mitra.kasir',compact('nama','image','data'));
    }

    public function kode(Request $request)
    {
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $image = auth()->guard('mitra')->user()->image;
        $nama = $request->kode;
        $output="Kode salah";
        $data = Pemesanan::query()->where('kode','LIKE', "%{$nama}%")
        ->get();
        if($data->count()>0){
            foreach($data as $item){
                if($item->status==2){
                    return response("Transaksi sudah dibayar");
                }else{
                    return response($data);
                }
            }
        }else{
            return response($output);
        }
    }

    public function pembayaran(Request $request)
    {
        $uangS = str_replace(',', '', $request->uang);
        $hargaS = str_replace('.', '', $request->harga);
        $hargaA = str_replace('Rp', '', $hargaS);
        $uang = (int)$uangS;
        $harga = (int)$hargaA;
        $nama = auth()->guard('mitra')->user()->nama;
        $id = auth()->guard('mitra')->user()->id;
        $image = auth()->guard('mitra')->user()->image;
        $data = new Transaksi();
        $data->id_pemesanan = $request->id;
        $data->total_biaya = $harga;
        $data->uang = $uang;
        $data->kembalian = $uang - $harga;
        $data->save();
        Pemesanan::where('id',$request->id)
                    ->update([
                        'status' => 2
                    ]);
        $id = $data->id;
        $data = DB::table('transaksis')
        ->join('pemesanans','pemesanans.id','=','id_pemesanan')
        ->join('ruangs','ruangs.id','=','pemesanans.id_ruangan')
        ->select('ruangs.nama as namaRuangan','pemesanans.*','transaksis.*')
        ->where('transaksis.id',$id)
        ->get();
        return view('mitra.nota',compact('nama','image','data'));
    }
}


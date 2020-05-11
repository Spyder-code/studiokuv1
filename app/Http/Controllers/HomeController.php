<?php

namespace App\Http\Controllers;

use App\Notifikasi;
use Illuminate\Http\Request;
use App\Pemesanan;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $url = $request->session()->get('url');
        if($url==""){
            return redirect('/');
        }else {
            return redirect($url);
        }
    }

    public function account()
    {
        $id = Auth::user()->id;
        $notif = Notifikasi::all()
        ->where('id_user',$id)
        ->where('status',0)
        ->count();
        $user = User::all()->where('id',$id);
        return view('user.account',compact('user','notif'));
    }

    public function pesananSaya()
    {
        $id = Auth::user()->id;
        $pesanan = DB::table('pemesanans')
        ->join('users','users.id','=','pemesanans.id_user')
        ->join('ruangs','ruangs.id','=','pemesanans.id_ruangan')
        ->join('studios','studios.id','=','ruangs.id_studio')
        ->join('mitras','mitras.id','=','studios.id_mitra')
        ->select('users.name as nama_user','pemesanans.*','ruangs.nama as nama_ruangan','ruangs.image','mitras.nama as nama_mitra','ruangs.kategori')
        ->where('pemesanans.id_user',$id)
        ->get();
        $notif = Notifikasi::all()
        ->where('id_user',$id)
        ->where('status',0)
        ->count();
        return view('user.pesanan',compact('pesanan','notif'));
    }

    public function detailPesanan(Pemesanan $pemesanan)
    {
        $id = $pemesanan->id;
        $idUser = Auth::user()->id;
        $transaksi = DB::table('pemesanans')
        ->join('users','users.id','=','pemesanans.id_user')
        ->join('ruangs','ruangs.id','=','pemesanans.id_ruangan')
        ->join('studios','studios.id','=','ruangs.id_studio')
        ->join('mitras','mitras.id','=','studios.id_mitra')
        ->select('users.name as nama_user','pemesanans.*','ruangs.nama as nama_ruangan','ruangs.image','mitras.nama as nama_mitra','ruangs.kategori','studios.name as nama_studio')
        ->where('pemesanans.id',$id)
        ->get();
        $notif = Notifikasi::all()
        ->where('id_user',$idUser)
        ->where('status',0)
        ->count();
        return view('user.detailPesanan',compact('transaksi','notif'));

    }

    public function changeImage(Request $request)
    {
        $id = Auth::user()->id;
        $nama = Auth::user()->name;
        $folderPath = public_path('image/');
        $request->validate([
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->img == "user.jpg") {
            if ($files = $request->file('images')) {
                $destinationPath = public_path('image/');
                $profileImage =  $nama.".".$files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $insert['image'] = "$profileImage";
                User::where('id', $id)->update([
                    'image' => "$profileImage"
                ]);
                return back()->with(['success' => 'Image berhasil diubah']);
            }
        }else {
            if (File::exists(public_path('image/' . $request->img))) {

                File::delete(public_path('image/' . $request->img));
            }
            if ($files = $request->file('images')) {
                $destinationPath = public_path('image/');
                $profileImage =  $nama.".".$files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $insert['image'] = "$profileImage";
                User::where('id', $request->id)->update([
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
        $pass = Auth::User()->password;
        $id = Auth::User()->id;
        if (Hash::check($request->pass1, $pass)) {
            User::where('id', $id)->update([
                'password' => Hash::make($request->pass2)
            ]);
            return back()->with(['success' => 'Password berhasil diubah']);
        }
        return back()->with(['danger' => 'Wrong password']);
    }

    public function notifikasi()
    {
        $id = Auth::user()->id;
        $user = User::all()->where('id',$id);
        $notif = Notifikasi::all()->where('id_user',$id);
        return view('user.notifikasi',compact('user','notif'));
    }

    public function transaksi(Request $request)
    {
        $id = $request->session()->get('idPesanan');
        $idUser = Auth::user()->id;
        $notif = Notifikasi::all()
        ->where('id_user',$idUser)
        ->where('status',0)
        ->count();
        $transaksi = DB::table('pemesanans')
        ->join('users','users.id','=','pemesanans.id_user')
        ->join('ruangs','ruangs.id','=','pemesanans.id_ruangan')
        ->join('studios','studios.id','=','ruangs.id_studio')
        ->join('mitras','mitras.id','=','studios.id_mitra')
        ->select('users.name as nama_user','pemesanans.*','ruangs.nama as nama_ruangan','ruangs.image','mitras.nama as nama_mitra','ruangs.kategori','studios.name as nama_studio')
        ->where('pemesanans.id',$id)
        ->get();
        return view('user.transaksi',compact('transaksi','notif'));
    }

    public function pembayaran(Request $request)
    {
        $idUser = Auth::user()->id;
        $notif = Notifikasi::all()
        ->where('id_user',$idUser)
        ->where('status',0)
        ->count();
        $id = $request->session()->get('idPesanan');
        $data = Pemesanan::all()->where('id',$id);
        return view('user.pembayaran',compact('data','notif'));
    }

    public function verifikasi(Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $idUser = Auth::user()->id;
        $id = $request->id;
        Pemesanan::where('id',$id)
        ->update([
            'status' => $request->status,
            'kode' =>$request->kode
        ]);
        Notifikasi::create([
            'id_user' => $idUser,
            'title' => "Booking",
            'isi' => "Booking studio ".$request->studio." ruangan ".$request->ruang." Berhasil!",
            'status' => 0
        ]);
            return redirect('pembayaran/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

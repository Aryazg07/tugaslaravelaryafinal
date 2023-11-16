<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class PetugasController extends Controller
{
    function index()
    {
        $judul = "selamat datang asep";

        $petugas = DB::table('petugas')->get();
        return view('petugas', ['TextJudul' =>  $judul, 'petugas' => $petugas]);
    }

    function tampil_petugas()
    {
        $judul = "selamat datang ditambah petugas petugas";

        return view('isi-petugas', ['TextJudul' =>  $judul,]);
    }

    function proses_tambah_petugas(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5'
        ]);
        $nama = $request->nama;
        $username = $request->username;
        $password = $request->password;
        $telp = $request->telp;
        $level = $request->level;

        DB::table('petugas')->insert([

            'nama_petugas' => $nama,
            'username' => $username,
            'password' => Hash::make($password),
            'telp' => $telp,
            'level' => $level,

        ]);

        return redirect('/petugas');
    }

    function detail_petugas($id)
    {
        // $pengaduan = Pengaduan::where"id_pengaduan",$id->first();
        $petugas = DB::table('petugas')->where('id_petugas', $id)->first();
        return view('detail-petugas', ['petugas' => $petugas]);
    }

    function update_petugas($id)
    {
        $petugas = DB::table('petugas')->where('id_petugas', $id)->first();
        return view('update-petugas', ['petugas' => $petugas]);
    }

    function proses_update_petugas(Request $request, $id)
    {
        $nama = $request->nama_petugas;

        DB::table('petugas')
            ->where('id_petugas', $id)
            ->update(['nama_petugas' => $nama]);

        return redirect('/petugas');
    }

    function petugas_login()
    {
        return view('/petugas_login');
    }

    function login_petugas(Request $request)
    {
        $data = $request->only("username", "password");
        if (Auth::guard("Petugas")->attempt($data)) {
            return redirect('/petugas_home');
        } else {
            return view('petugas_login');
        }
    }

    public function petugas_home()
    {
        $pengaduan = pengaduan::all();
        return view('petugas_home', ['pengaduan' => $pengaduan]);
    }

    function tampil_register_petugas()
    {
        return view('/petugas_register');
    }

    function petugas_register(Request $request)
    {
        $nama = $request->nama;
        $username = $request->username;
        $level = $request->level;
        $password = $request->password;
        $telepon = $request->telepon;

        DB::table('petugas')->insert([
            'nama_petugas' => $nama,
            'username' => $username,
            'level' => $level,
            'password' => Hash::make($request->password),
            'telp' => $telepon
        ]);

        return redirect('/petugas_login');
    }

    function petugas_logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/petugas_login');
    }

    function detail_petugas_tanggapan($id)
    {
        // $pengaduan = Pengaduan::where"id_pengaduan",$id->first();
        $tanggapan = DB::table('tanggapan')->where('id_pengaduan', $id)->first();
        $pengaduan = DB::table('pengaduan')->where('id_pengaduan', $id)->first();
        
        return view('detail_tanggapan', ['tanggapan' => $tanggapan, 'pengaduan' => $pengaduan,]);
    }

    function proses_berikan_tanggapan(Request $request, $id)
    {
        $tanggapan = $request->tanggapan;
        $status = $request->status;
        $id_petugas = $request->id_petugas;

        DB::table('tanggapan')
            ->insert([
                'tanggapan' => $tanggapan,
                "id_pengaduan" => $id,
                'tgl_pengaduan' => date('y-m-d'),
                'id_petugas' => Auth::guard('Petugas')->user()->id,
            ]);

        DB::table('pengaduan')
            ->where('id_pengaduan', $id)
            ->update(['status' => $status]);

        return redirect('petugas_home');
    }
}

<?php

namespace App\Http\Controllers;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    public function index()
    {
        $jk = ['L', 'P'];
        $ul = ['1', '2', '3'];
        $cabang = DB::table('cabangs')->get();
        $data = DB::table('users')->paginate(10);
        return view('users.index', compact('data', 'cabang', 'jk', 'ul'));
    }
    public function proses_add_users(Request $request)
    {
        // dd($request->all());
        $data = DB::table("users")->insert([
            'name' => $request->name,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_cabang' => $request->id_cabang,
            'user_level' => $request->user_level,
            'password' => Hash::make($request->password),
        ]);
        Alert::success('Users Berhasil Di Tambah');
        return redirect()->route('users', compact('data'));
    }
    public function proses_edit_users(Request $request)
    {
        // dd($request->password);
        $id = $request->id;
        if ($request->password == null) {
            $data = DB::table("users")->where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_cabang' => $request->id_cabang,
                'user_level' => $request->user_level,
                // 'password' => Hash::make($request->password),
            ]);
        } else {
            $data = DB::table("users")->where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_cabang' => $request->id_cabang,
                'user_level' => $request->user_level,
                'password' => Hash::make($request->password),
            ]);
        }
        Alert::success('Users Berhasil Di Edit');
        return redirect()->route('users', compact('data'));
    }
    public function delete_users($id)
    {
        $data = DB::table('users')->where('id', $id)->delete();
        Alert::success('Users Berhasil Di Hapus');
        return redirect()->route('users', compact('data'));
    }
}

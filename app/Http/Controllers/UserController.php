<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function index(Request $request)
    {
        $roles = User::distinct('role')->pluck('role'); // Ambil semua roles yang unik dari tabel users

        $users = User::when($request->input('name'), function ($query, $name) {
                $query->where('name', 'like', '%' . $name . '%')
                    ->orWhere('email', 'like', '%' . $name . '%');
            })
            ->when($request->input('role'), function ($query, $role) {
                $query->where('role', $role);
            })
            ->paginate(10);

        return view('pages.users.index', compact('users', 'roles'));
    }


    public function profile()
{
    $user = Auth::user()->id;

    // Menggunakan first() untuk mendapatkan satu baris hasil
    $data_profile = User::where('id', $user)->get();

    if (!$data_profile) {
        // Handle jika data profil tidak ditemukan
        abort(404);
    }

    $data = [
        'title' => 'Setting Profile',
        'data_profile' => $data_profile,
    ];

    return view('pages.profile', $data);
}

    


    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required|in:admin,staff,user',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('pages.profile')->with('success', 'Profile berhasil di EDIT!');
    }



    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,staff,user'
        ]);

        $user   = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil dibuat!');
    }

    public function show($id)
    {
        return view('pages.users.show');
    }

    public function edit($id)
    {
        $user  = User::findOrFail($id);
        return view('pages.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required|in:admin,staff,user',
        ]);

        $user   = user::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save(); 

        if($request->password) {
            $user->password = Hash::make($request->password);
            $user->save(); 
        }

        return redirect()->route('users.index')->with('success', 'User berhasil di EDIT!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil di Hapus!');
    }
}

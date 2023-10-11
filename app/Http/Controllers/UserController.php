<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

// Ramadhan abdul aziz 6706223026 46-04
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("user.daftarPengguna", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("user.registrasi");
    }

    /**
     * Store a newly created resource in storag
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'fullname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:1000'],
            'birthdate' => ['required', 'date',],
            'phoneNumber' => ['required', 'string', 'max:20'],
            'agama' => ['required', 'string', 'max:20'],
            'jenis_kelamin' => ['required', 'numeric', 'in:0,1'],
        ]);

        DB::beginTransaction();

        try {
            User::create([
                'username' => $request->username,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'birthdate' => $request->birthdate,
                'phoneNumber' => $request->phoneNumber,
                'agama' => $request->agama,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);

            DB::commit();

            return redirect()->route("user.daftarPengguna")->with('success', "Added user successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("user.daftarPengguna")->with('error', "Added user failed");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        return view('user.infoPengguna', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

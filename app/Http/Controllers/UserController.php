<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Faker\Core\Uuid;
use App\Models\Token;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select(['name', 'email', 'role', 'is_active'])->get();
        return view('user/menu_user', compact(['users']));
    }

    public function createForm(){
        return view('user/add_user');
    }
    function store(Request $request)
    {
        try {
            $data = $request->all();

            $rules = [
                'name' => 'required|string|max:25',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8'
            ];

            $message = [
                'required' => 'Input :attribute wajib diisi',
                'email' => 'Mohon isi email dengan benar',
                'confirmed' => 'Re-Password tidak cocok',
                'min' => 'Jumlah character min :min,',
                'max' => 'Jumlah character max :max,'
            ];

            Validator::make($data, $rules, $message)->validate();
    
            $newUser = new User();
            $newUser->name = $data["name"];
            $newUser->uuid = Str::uuid()->toString();
            $newUser->email = $data["email"];
            $newUser->password = Hash::make($data["password"]);
            $newUser->role = $data["role"];
            $newUser->save();

            Alert::success("Success", "User Berhasil Ditambahkan");
            return redirect("/users");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // public function index()
    // {
    //     $user = User::latest()->get();
    //     return view('2_account', compact('user'));
    // }

    // public function create(Request $request, User $newUser)
    // {
    //     $data = $request->all();
    //     //  $file = $request->file("faq-attachment");
    //     $uuid = new Uuid();
    //     $newUser->uuid = $uuid->uuid3();
    //     $newUser->name = $data["name"];
    //     $newUser->email = $data["email"];
    //     // dd($data);
    //     $newUser->password = Hash::make($data["password"]);

    //     $newRole = new Role();
    //     $newRole->uuid = $newUser->uuid;
    //     $newRole->is_supervisor = false;
    //     $newRole->is_admin = false;
    //     $newRole->is_user = true;

    //     Alert::success('Success', "Account Berhasil Ditambah")->autoClose(3000);
    //     $newRole->save();
    //     $newUser->save();


    //     return redirect("/account/view/$newUser->uuid");
    // }

    // public function view($uuid)
    // {
    //     $user = User::where('uuid', '=', $uuid)->first();
    //     // dd($user);
    //     return view('user/view_user', compact('user'));
    // }

    // public function update(Request $request, User $newUser)
    // {
    //     // dd($idFaq);

    //     $data = $request->all();

    //     // dd($data);

    //     $newUser = User::find($data["id"]);
    //     $newUser->name = $data["name"];
    //     $newUser->email = $data["email"];

    //     // $role = Unit::where('units.uuid', '=', $data["uuid"])->first();
    //     // if (!empty($role)) {
    //     //     $role->check_humas = $request->has("check-humas") ?? false;
    //     //     $role->check_renkeu = $request->has("check-renkeu") ?? false;
    //     //     $role->check_spi = $request->has("check-spi") ?? false;
    //     //     $role->check_umum = $request->has("check-umum") ?? false;
    //     //     $role->check_hukum = $request->has("check-hukum") ?? false;
    //     //     $role->check_investigasi = $request->has("check-investigasi") ?? false;
    //     //     $role->check_kepaniteraan = $request->has("check-kepaniteraan") ?? false;
    //     //     $role->check_sdm = $request->has("check-sdm") ?? false;
    //     //     $role->check_tu = $request->has("check-tu") ?? false;
    //     //     $role->save();
    //     // }

    //     Alert::success('Success', "Data '$newUser->name'  Berhasil di Edit")->autoClose(3000);
    //     $newUser->save();

    //     return redirect()->back();
    // }

    // public function resetPassword(Request $request, User $newUser)
    // {
    //     // dd($idFaq);
    //     $data = $request->all();


    //     $newUser = User::find($data["id"]);
    //     // dd($newUser);
    //     $newUser->password = Hash::make($newUser->email);
    //     // dd($newUser->password);

    //     Alert::success('Success', "Password Berhasil di Reset");
    //     $newUser->save();

    //     return redirect()->back();
    // }

    // public function delete($id)
    // {
    //     $id = User::find($id);
    //     $name = $id->name;

    //     $role = Role::where('uuid', "=", $id->uuid)->get()->first();
    //     if (!empty($role)) {
    //         $role->delete();
    //     }

    //     $id->delete();
    //     Alert::success('Account', $name . ", Berhasil Dihapus")->hideCloseButton();

    //     return redirect()->back();
    // }
}

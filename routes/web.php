<?php

use App\Http\Controllers\DeviceController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('0_Welcome');
});


// begin :: Login

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ["required"],
        'password' => ["required"]
    ]);
    if (Auth::attempt($credentials)) {
        // dd($credentials);
        $request->session()->regenerate();
        Alert::toast('Login Success','success')->autoClose(2500);
        return redirect()->intended("/dashboard");
    }
    // dd(Auth::attempt($credentials), Auth::check());
    Alert::error("Login Gagal", "Pastikan Email dan Password Benar");
    return back();
});

Route::group(['middleware' => ["auth"]], function () {
// Begin :: Group Route

    Route::get('/logout', function (Request $request) {
            // auth()->user()->forceFill([
            //     "remember_token" => null,
            // ])->save();

            Auth::logout();

            Request()->session()->invalidate();

            Request()->session()->regenerateToken();


            if (str_contains($request->url(), "api")) {
                return response()->json([
                    "status" => "success",
                    "msg" => "Logged out",
                ]);
            }
            return redirect('/');
        });

    // end :: Login

    Route::get('/dashboard', function () {
        return view('1_dashboard_new');
    });

    Route::resource('/account', UserController::class);

    Route::post('/account/new',  [UserController::class, 'create']);

    Route::get('/account/view/{uuid}',  [UserController::class, 'view']);

    Route::post('/account/update',  [UserController::class, 'update']);

    Route::post('/account/password/reset',  [UserController::class, 'resetPassword']);

    Route::delete('/account/delete/{id}',  [UserController::class, 'delete']);

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get(
        '/users/create',
        [
            UserController::class, 'createForm'
        ]
    )->name('users.createForm');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}/edit-password', [UserController::class, 'editPassword'])->name('users.editPassword');
    Route::post('/users/{id}/update-password', [UserController::class, 'updatePassword'])->name('users.updatePassword');

    Route::get('/devices', [DeviceController::class, 'index'])->name('devices.index');
    Route::get('/devices/create', [DeviceController::class, 'createForm'])->name('devices.createForm');
    Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');



    Route::get(
        '/dokumen-po',
        function () {
            return view('Dokumen_PO.view');
        }
    );
    Route::get(
        '/dokumen-gr-ses',
        function () {
            return view('Dokumen_GR_SES.view');
        }
    );
    Route::get(
        '/bap',
        function () {
            $no = 1;
            $arr = [
                1, 2, 3, 4, 5, 6, 7, 8, 9
            ];
            $gr_ses = [];
            foreach ($arr as $item) {
                array_push($gr_ses, "00" . $item . "81" . $no);
            };
            // dd($gr_ses);
            return view('BAP.list', ['gr_ses' => $gr_ses]);
        }
    );
    Route::get(
        '/invoice',
        function () {
            // $no = 1;
            // $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
            // $gr_ses = [];
            // foreach ($arr as $item) {
            //     array_push($gr_ses, "00" . $item . "81" . $no);
            // };
            // dd($gr_ses);
            return view('Invoice.list');
        }
    );
    Route::get('/invoice/new', function () {
        $is_edit = false;
        return view('Invoice.form', ['is_edit' => $is_edit]);
    });
    Route::get('/invoice/edit',
        function () {
            $is_edit = true;
            return view('Invoice.form', ['is_edit' => $is_edit]);
        }
    );
// End :: Group Route
});
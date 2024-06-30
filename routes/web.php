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

Route::get('/users', [UserController::class,'index'])->name('users.index');
Route::get('/users/create', [UserController::class,'createForm'])->name('users.createForm');
Route::post('/users', [UserController::class,'store'])->name('users.store');

Route::get('/devices', [DeviceController::class, 'index'])->name('devices.index');
Route::get('/devices/create', [DeviceController::class, 'createForm'])->name('devices.createForm');
Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');

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

    Route::resource('/account', UserController::class);

    Route::post('/account/new',  [UserController::class, 'create']);

    Route::get('/account/view/{uuid}',  [UserController::class, 'view']);

    Route::post('/account/update',  [UserController::class, 'update']);

    Route::post('/account/password/reset',  [UserController::class, 'resetPassword']);

    Route::delete('/account/delete/{id}',  [UserController::class, 'delete']);

    Route::post('/dashboard-login', function (Request $request) {
        // Redirect::to('localhost:8000/api/login');
        // dd($request, $UserName, $UserPassword );
        // $credentials = $request->validate([
        //     'UserName' => ["required", "email"],
        //     'UserPassword' => ["required"]
        // ]);
        // $token = STR::random(50);
        // $data = [
        //     'email' => $UserName,
        //     'password' => $UserPassword
        // ];
        // if (Auth::attempt($data)) {
        //     $user = auth()->user();
        //     $token_user = $user->createToken($user->name)->plainTextToken;
        //     // dd($token_user);
        //     auth()->user()->forceFill([
        //         "remember_token" => $token_user,
        //     ])->save();
        //     return response()->json([
        //         "token" => $token_user,
        //         "user" => $user,
        //     ])->cookie("BPMCSRF", $token, 60);
        // }
        // return Redirect::to('https://crm.wika.co.id/api/login');
        $loginSukses = true;
        Alert::success("Success", "Login Berhasil");
        return view('1_dashboard', compact(["loginSukses"]));
    });

    Route::get('/metronic', function () {
        return view('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('1_dashboard_new');
    });

    Route::get('/dashboard-unit-1', function () {
        return view('dashboard_unit_1');
    });

    Route::get('dashboard-unit-2', function () {
        return view('dashboard_unit_2');
    });

    Route::get('dashboard-unit-3', function () {
        return view('dashboard_unit_3');
    });

    Route::get('dashboard-unit-4', function () {
        return view('dashboard_unit_4');
    });

    Route::get('dashboard-unit-5', function () {
        return view('dashboard_unit_5');
    });

    Route::get('dashboard-unit-6', function () {
        return view('dashboard_unit_6');
    });

    Route::get('dashboard-unit-7', function () {
        return view('dashboard_unit_7');
    });

    Route::get('dashboard-unit-8', function () {
        return view('dashboard_unit_8');
    });

    Route::get('dashboard-unit-9', function () {
        return view('dashboard_unit_9');
    });

    Route::get('/setting', function () {
        $cookie = Cookie::get('color');
        $active = Cookie::get('active');
        $chartColor = Cookie::get('chart');
        // $chartColor = ["#017EB8", "#28B3AC", "#F7AD1A", "#9FE7F5", "#E86340", "#063F5C"];
        // dd($cookie, $active);
        return view('9_setting', compact(['cookie', 'active', 'chartColor']) );
    });

    Route::post('/setting/cookie', function (Request $request) {
        // $response = new Response('Cookie');
        // $response->withCookie(cookie('color', $request["aside-color"]);
        $cookie = cookie()->forever('color', $request["aside-color"]);
        $active = cookie()->forever('active', $request["active-color"]);
        $chartColor = cookie()->forever('chart', $request["chart-color"]);
        //  dd($request);
        //  dd($cookie, $active, $chartColor, $request->get('chart-color'));
        return redirect()->back()->withCookies([$cookie, $active, $chartColor]) ;
    });

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
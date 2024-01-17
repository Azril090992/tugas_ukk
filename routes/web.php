    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\biodataCon;
    use App\Http\Controllers\LoginCon;
    use App\Http\Controllers\DashboardCon;
    use App\Http\Controllers\registerCon;
    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/biodata/tampil', [biodataCon::class, 'index'])->name('indexbiodata')->middleware('auth');
    Route::get('/biodata/input', [biodataCon::class, 'input'])->name('inputbiodata')->middleware('auth');
    Route::post('/biodata/storeinput', [biodataCon::class, 'storeinput'])->name('storeInputbiodata')->middleware('auth');
    Route::get('/biodata/update/{id}', [biodataCon::class, 'update'])->name('updatebioata')->middleware('auth');
    Route::post('/biodata/storeupdate', [biodataCon::class, 'storeupdate'])->name('storeUpdatebiodata')->middleware('auth');
    Route::get('/biodata/delete/{id}', [biodataCon::class, 'delete'])->name('deletebiodata')->middleware('auth');
    Route::get('/biodata/upload', [biodataCon::class, 'upload'])->name('upload')->middleware('auth');
    Route::post('/biodata/uploadproses', [biodataCon::class, 'uploadproses'])->name('uploadproses')->middleware('auth');

    Route::get('/login', [LoginCon::class, 'login'])->name('login');
    Route::post('actionlogin', [LoginCon::class, 'actionlogin'])->name('actionlogin');
    Route::get('dashboard', [DashboardCon::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('actionlogout', [LoginCon::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
    Route::get('register', [RegisterCon::class, 'register'])->name('register');
    Route::post('register/action', [RegisterCon::class, 'actionregister'])->name('actionregister');
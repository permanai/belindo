<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Role; 
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Charts\MonthlyUsersChart;
use App\Charts\MonthlyUsersCharts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $request->filled('remember'))) {
        $request->session()->regenerate();
        $user = Auth::user();
        if ($user->role_id == 1) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('index');
        }
    }

    return back()->with('loginError', 'Email atau password salah!');
}
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function register()
    {
        if (Auth::check()) {
            return redirect('/index'); 
        }
        $roles = Role::where('name', 'user')->get();
    
        return view('Auth.register', ['roles' => $roles]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'telp' => 'required|min:11|max:13|regex:/^[0-9\+]*$/',
            'alamat' => 'required|string',
        ]);
    
        $id_user = Str::uuid();
        $defaultRoleId = 2;
    
        $user = User::create([
            'id_user' => $id_user,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $defaultRoleId,
            'telp' => $data['telp'], 
            'alamat' => $data['alamat'],
        ]);
        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
    
// public function diagram()
// {
//     $data = $this->fetchChartData(); 
//     return view('admin.index', compact('data')); 
// }

private function fetchChartData()
{
    $userCounts = User::where('role_id', 2)
        ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $dates = [];
    $userCountsData = [];

    foreach ($userCounts as $userCount) {
        $dates[] = Carbon::parse($userCount->month)->format('Y-m');
        $userCountsData[] = $userCount->count;
    }

    return [
        'dates' => $dates,
        'userCountsData' => $userCountsData,
    ];
}

public function diagram(MonthlyUsersChart $chart)
    {
        $data['chart'] = $chart->build();
        return view('admin.index', ['chart' => $chart->build()]);
    }


}
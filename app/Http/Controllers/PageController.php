<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function getCatData()
    {
        return [
            ['id' => 1, 'nama' => 'Mochi', 'jam_makan' => '07.00', 'makanan' => 'Dry Food Tuna', 'porsi' => '1 mangkuk', 'status' => 'Sudah Makan', 'mood' => 'Aktif'],
            ['id' => 2, 'nama' => 'Oyen', 'jam_makan' => '08.00', 'makanan' => 'Wet Food Salmon', 'porsi' => '1 sachet', 'status' => 'Belum Makan', 'mood' => 'Manja'],
            ['id' => 3, 'nama' => 'Luna', 'jam_makan' => '12.00', 'makanan' => 'Dry Food Chicken', 'porsi' => '1/2 mangkuk', 'status' => 'Sudah Makan', 'mood' => 'Ngantuk'],
            ['id' => 4, 'nama' => 'Milo', 'jam_makan' => '16.00', 'makanan' => 'Snack Kucing', 'porsi' => '3 pcs', 'status' => 'Terjadwal', 'mood' => 'Ceria'],
            ['id' => 5, 'nama' => 'Cimut', 'jam_makan' => '19.00', 'makanan' => 'Wet Food Tuna', 'porsi' => '1 sachet', 'status' => 'Belum Makan', 'mood' => 'Rewel'],
        ];
    }

    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $username = $request->input('username', 'Tamu');
        return redirect()->route('dashboard', ['username' => $username]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username', 'Tamu');
        $kucing = $this->getCatData();

        $total = count($kucing);
        $sudah_makan = count(array_filter($kucing, fn($k) => $k['status'] === 'Sudah Makan'));
        $progress = ($total > 0) ? round(($sudah_makan / $total) * 100) : 0;

        return view('dashboard', compact('username', 'kucing', 'progress', 'sudah_makan'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username', 'Tamu');
        $daftar_kucing = $this->getCatData();

        return view('pengelolaan', compact('username', 'daftar_kucing'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username', 'Tamu');

        // Data profil dirombak agar lebih relevan
        $profil = [
            'role' => 'Cat Parent',
            'level' => 'Penyayang Anabul',
            'deskripsi' => 'Memastikan kucing peliharaan mendapatkan nutrisi terbaik dengan jadwal makan yang teratur dan pantauan mood harian.',
            'bergabung' => 'April 2026',
            'total_kucing' => 5
        ];

        return view('profile', compact('username', 'profil'));
    }
}

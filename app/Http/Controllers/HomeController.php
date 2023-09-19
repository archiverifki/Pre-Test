<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RandomUser;
use App\Models\HasilResponse;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getRandomUserData()
    {
        $randomUser = new RandomUser();
        $userData = $randomUser->getRandomUser();

        return response()->json($userData);
    }

    
    public function index()
    {
        $this->response();
    
        $userData = HasilResponse::with(['jenisKelamin', 'profesi'])->get();
        // $userData = HasilResponse::get();



        return view('home', ['userData' => $userData]);
    }

   

    public function response()
    {
        $randomUser = new RandomUser();
        $userData = $randomUser->getRandomUser();

        if ($userData) {
            // Konversi jenis kelamin
            $jenisKelamin = ($userData['results'][0]['gender'] === 'female') ? 2 : 1;

            // Gabungkan nama depan dan nama belakang
            $nama = $userData['results'][0]['name']['first'] . ' ' . $userData['results'][0]['name']['last'];

            // Ambil nama jalan
            $namaJalan = $userData['results'][0]['location']['street']['name'];

            // Ambil email
            $email = $userData['results'][0]['email'];

            // Hitung angka kurang dan angka lebih
            $md5Hash = md5(json_encode($userData));
            $angka_kurang = 0;
            $angka_lebih = 0;
            for ($i = 0; $i < strlen($md5Hash); $i++) {
                $digit = $md5Hash[$i];
                if (is_numeric($digit)) {
                    $digitValue = intval($digit);
                    if ($digitValue < 7) {
                        $angka_kurang++;
                    } else {
                        $angka_lebih++;
                    }
                }
            }

            // Ambil profesi dengan huruf acak
            $profesi = chr(rand(65, 69)); // Huruf A sampai E secara acak

            // Simpan data ke dalam tabel hasil_response
            $hasilResponse = new HasilResponse();
            $hasilResponse->jk_kode = $jenisKelamin;
            $hasilResponse->nama = $nama;
            $hasilResponse->nama_jalan = $namaJalan;
            $hasilResponse->email = $email;
            $hasilResponse->angka_kurang = $angka_kurang;
            $hasilResponse->angka_lebih = $angka_lebih;
            $hasilResponse->profesi_kode = $profesi;
            $hasilResponse->plain_json = json_encode($userData);
            $hasilResponse->save();
        }

        return view('home', ['userData' => $userData]);
    }


    public function ringkasanProfesi()
    {
        $ringkasanProfesi = HasilResponse::with('profesi')
            ->select('profesi_kode', DB::raw('COUNT(*) as total'))
            ->groupBy('profesi_kode')
            ->get();

        return view('ringkasan', ['ringkasanProfesi' => $ringkasanProfesi]);
    }



}

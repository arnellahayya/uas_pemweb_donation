<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function getNews()
    {
        // Ambil API key dari .env
        $apiKey = env('ab9b7b933b4bf223bc8b976346b68afd');

        // URL untuk mendapatkan berita terkini menggunakan Currents API
        $url = 'https://gnews.io/api/v4/top-headlines?country=id&token=ab9b7b933b4bf223bc8b976346b68afd' . $apiKey;

        // Request ke API menggunakan Laravel HTTP Client
        $response = Http::get($url);

        // Cek apakah request berhasil
        if ($response->successful()) {
            // Ambil data dari API
            $data = $response->json();

            // Kirimkan data sebagai JSON ke frontend
            return response()->json($data);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to load news.'
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function fetchNews()
    {
        $apiKey = env('NEWS_API_KEY', 'ac08a93ad958433cbd5af4c2ed71d882');
        $url = "https://newsapi.org/v2/top-headlines?country=id&category=general&apiKey={$apiKey}";

        try {
            $response = Http::get($url);

            // Tambahkan log untuk melihat data API
            \Log::info('NewsAPI Response: ', $response->json());

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json(['error' => 'Gagal memuat berita dari API'], $response->status());
            }
        } catch (\Exception $e) {
            \Log::error('NewsAPI Error: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan saat memproses permintaan'], 500);
        }
    }

}

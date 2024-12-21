<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function fetchNews()
    {
        $rssUrl = 'https://rss.tempo.co/rss/topnews';

        // Fetch RSS Feed
        $rssContent = simplexml_load_file($rssUrl);

        // Cek apakah RSS feed tersedia
        if (!$rssContent) {
            return response()->json([
                'message' => 'Failed to load news.',
            ], 500);
        }

        $newsData = [];
        foreach ($rssContent->channel->item as $item) {
            // Menyiapkan data berita
            $newsData[] = [
                'title' => (string) $item->title,
                'link' => (string) $item->link,
                'description' => strip_tags((string) $item->description),
                'image' => (string) $item->enclosure['url'] ?? '/images/default-news.png',
            ];
        }

        return response()->json([
            'message' => 'News fetched successfully',
            'data' => $newsData,
        ]);
    }

    // Fungsi untuk menampilkan halaman utama dengan berita
    public function index()
    {
        $rssUrl = 'https://lapi.kumparan.com/v2.0/rss/';

        // Fetch RSS Feed
        $rssContent = simplexml_load_file($rssUrl);

        // Cek apakah RSS feed tersedia
        if (!$rssContent) {
            return view('index', ['message' => 'Failed to load news.']);
        }

        $newsData = [];
        foreach ($rssContent->channel->item as $item) {
            // Menyiapkan data berita
            $newsData[] = [
                'title' => (string) $item->title,
                'link' => (string) $item->link,
                'description' => strip_tags((string) $item->description),
                'image' => (string) $item->enclosure['url'] ?? '/images/default-news.png',
            ];
        }

        // Kirim data berita ke view
        return view('index', ['news' => $newsData]);
    }

}

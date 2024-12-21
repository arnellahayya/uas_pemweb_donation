<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function fetchNews()
    {
        $rssUrl = 'https://www.antaranews.com/rss/topnews';

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
}

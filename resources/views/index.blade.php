@extends('layouts.header')
@section('title', 'Peduli Bersama')

@section('content')
    {{-- AWAL SLIDE GAMBAR --}}
    <div id="carouselExampleControls" class="carousel slide fade-in" data-ride="carousel">
        <div class="carousel-caption d-none d-md-block">
            <div class="header text-center">
                <h1 class="text-black">Mereka Bersama Kita.</h1>
                <p class="text-black">Bersama kita bisa membuat perubahan</p>
            </div>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/images/index/header-1.png" alt="Gambar1" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/index/header-2.png" alt="Gambar2" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/index/header-3.png" alt="Gambar3" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/index/header-4.png" alt="Gambar4" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/index/header-5.png" alt="Gambar5" />
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/images/index/header-6.png" alt="Gambar6" />
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    {{-- AKHIR SLIDE GAMBAR --}}

    {{-- AWAL KONTEN BAWAH --}}
    <div class="content text-center mt-5 fade-in">
        <button class="pushable" onclick="redirectDonasi()">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">Mulai Donasi</span>
        </button>
    </div>

    {{-- TAMBAHAN BAGIAN BERITA --}}
    <div id="news-section" class="container mt-5">
        <h2 class="text-center">Berita Terkini</h2>
        <div id="news-container" class="row">
            <p class="text-center">Memuat berita...</p>
        </div>
    </div>

    <script>
        // Fungsi untuk mengarahkan ke halaman donasi
        function redirectDonasi() {
            window.location.href = "/donasi";
        }

        async function loadNews() {
    const apiUrl = '/api/news'; // URL backend Laravel yang memanggil API Currents

    const newsContainer = document.getElementById('news-container');
    newsContainer.innerHTML = '<p class="text-center">Memuat berita...</p>';

    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        if (data.news && data.news.length > 0) {
            newsContainer.innerHTML = ''; // Bersihkan teks loading

            // Iterasi melalui berita dan tambahkan ke halaman
            data.news.forEach((article) => {
                const newsCard = document.createElement('div');
                newsCard.classList.add('col-md-4', 'mb-4');

                newsCard.innerHTML = `
                    <div class="card">
                        <img class="card-img-top" src="${article.image || '/images/default-news.jpg'}" alt="Berita">
                        <div class="card-body">
                            <h5 class="card-title">${article.title}</h5>
                            <p class="card-text">${article.description || ''}</p>
                            <a href="${article.url}" target="_blank" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                `;
                newsContainer.appendChild(newsCard);
            });
        } else {
            newsContainer.innerHTML = '<p class="text-center">Tidak ada berita terkini.</p>';
        }
    } catch (error) {
        console.error('Error fetching news:', error);
        newsContainer.innerHTML = '<p class="text-center">Terjadi kesalahan saat memuat berita.</p>';
    }
}

// Panggil fungsi loadNews saat halaman selesai dimuat
document.addEventListener('DOMContentLoaded', loadNews);

    </script>

    <style>
        .fade-in {
            opacity: 0;
            animation: fadeInAnimation 1s ease-in forwards;
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .carousel-caption {
            top: 40%;
            font-weight: 800;
            font-style: normal;
            text-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        }

        .carousel-caption h1,
        .carousel-caption p {
            font-weight: 500;
        }

        .pushable {
            position: relative;
            background: transparent;
            padding: 0px;
            border: none;
            cursor: pointer;
            outline-offset: 4px;
            outline-color: deeppink;
            transition: filter 250ms;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        .shadow {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: hsl(226, 25%, 69%);
            border-radius: 8px;
            filter: blur(2px);
            will-change: transform;
            transform: translateY(2px);
            transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
        }

        .edge {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 99%;
            border-radius: 12px;
            background: #073abb;
        }

        .front {
            display: block;
            position: relative;
            border-radius: 12px;
            background: #007bff;
            padding: 16px 32px;
            color: white;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 1rem;
            transform: translateY(-4px);
            transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
        }
    </style>

@include('layouts.footer')
@endsection

{{-- FOOTER --}}
<footer class="bg-gradient text-white mt-5 py-5 shadow-lg">
    <div class="container">
        <div class="row">
            {{-- Informasi Umum --}}
            <div class="col-md-4 mb-4">
                <h5>Peduli Bersama</h5>
                <p>
                    Menyediakan informasi terpercaya dan sumber daya untuk komunitas dengan gaya modern.
                </p>
            </div>

            {{-- Navigasi --}}
            <div class="col-md-4 mb-4">
                <h5>Navigasi</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-white text-decoration-none">Beranda</a></li>
                    <li><a href="/donasi" class="text-white text-decoration-none">Donasi</a></li>
                    <li><a href="/donatur" class="text-white text-decoration-none">List Donatur</a></li>
                </ul>
            </div>

            {{-- Media Sosial --}}
            <div class="col-md-4 mb-4 text-md-right text-center">
                <h5>Ikuti Kami</h5>
                <a href="#" class="text-white mr-3"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-white mr-3"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="text-white mr-3"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin fa-lg"></i></a>
            </div>
        </div>
        <hr class="border-white">
        <div class="text-center">
            <p class="mb-0 text-white">&copy; {{ date('Y') }} Peduli Bersama. Semua Hak Dilindungi.</p>
        </div>
    </div>
</footer>

<style>

    
    footer {
        background: linear-gradient(145deg, rgb(0, 162, 255), rgb(241, 0, 112));
        font-family: 'Poppins', sans-serif;
        box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        color: white;
    }

    footer h5 {
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 20px;
    }

    footer a {
        font-size: 16px;
        color: white;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    footer a:hover {
        color:rgb(255, 0, 162); /* Change hover color to a golden shade */
        transform: scale(1.1);
        text-decoration: none;
    }

    footer p {
        font-size: 14px;
        margin: 0;
        color: white;
    }

    footer .fab {
        font-size: 1.8rem;
        margin-right: 15px;
        transition: transform 0.3s ease, color 0.3s ease;
        color: white;
    }

    footer .fab:hover {
        color:rgb(0, 81, 255); /* Hover color for social media icons */
        transform: scale(1.2);
    }


    @media (max-width: 768px) {
        footer .text-md-right {
            text-align: center !important;
        }

        footer .fab {
            margin-right: 20px;
        }
    }
</style>

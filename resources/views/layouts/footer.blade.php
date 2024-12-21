{{-- FOOTER --}}
<footer class="bg-light text-dark mt-5 py-4">
    <div class="container">
        <div class="row">
            {{-- Informasi Umum --}}
            <div class="col-md-4 mb-4">
                <h5>Peduli Bersama</h5>
                <p>
                    Menyediakan informasi terpercaya dan sumber daya untuk komunitas.
                </p>
            </div>

            {{-- Navigasi --}}
            <div class="col-md-4 mb-4">
                <h5>Navigasi</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-dark text-decoration-none">Beranda</a></li>
                    <li><a href="/donasi" class="text-dark text-decoration-none">Donasi</a></li>
                    <li><a href="/donatur" class="text-dark text-decoration-none">List Donatur</a></li>
                </ul>
            </div>

            {{-- Media Sosial --}}
            <div class="col-md-4 mb-4 text-md-right text-center">
                <h5>Ikuti Kami</h5>
                <a href="#" class="text-dark mr-2"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-dark mr-2"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="text-dark mr-2"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-dark"><i class="fab fa-linkedin fa-lg"></i></a>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Peduli Bersama.</p>
        </div>
    </div>
</footer>


<style>
    footer {
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }

    footer h5 {
        font-weight: 600;
        font-size: 18px;
        margin-bottom: 15px;
    }

    footer a {
        font-size: 14px;
        color: #333;
        transition: color 0.3s ease;
    }

    footer a:hover {
        color: #007bff;
        text-decoration: underline;
    }

    footer p {
        font-size: 14px;
        margin: 0;
    }

    footer .fab {
        font-size: 1.5rem;
        margin-right: 10px;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    footer .fab:hover {
        color: #007bff;
        transform: scale(1.1);
    }

    @media (max-width: 768px) {
        footer .text-md-right {
            text-align: center !important;
        }

        footer .fab {
            margin-right: 15px;
        }
    }
</style>

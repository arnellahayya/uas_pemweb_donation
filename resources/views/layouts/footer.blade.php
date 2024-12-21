<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Ghazian')</title>
    <link rel="icon" href="/images/layout/ikon-logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    {{-- FOOTER --}}
    <footer class="footer">
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
                    
                </div>

                {{-- Media Sosial --}}
                <div class="col-md-4 mb-4 text-md-right text-center">
                    <h5>Ikuti Kami</h5>
                    <a href="#" class="social-icon"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin fa-lg"></i></a>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="footer-text">&copy; {{ date('Y') }} Peduli Bersama.</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<style>
    .footer {
        background-color: #f8f9fa;
        padding: 40px 0;
        font-family: 'Poppins', sans-serif;
    }

    .footer h5 {
        font-weight: 600;
        font-size: 18px;
        margin-bottom: 15px;
    }

    .footer .footer-link {
        font-size: 14px;
        color: #333;
        transition: color 0.3s ease;
    }

    .footer .footer-link:hover {
        color: #007bff;
        text-decoration: underline;
    }

    .footer .footer-text {
        font-size: 14px;
        margin: 0;
    }

    .footer .social-icon {
        font-size: 1.5rem;
        margin-right: 10px;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .footer .social-icon:hover {
        color: #007bff;
        transform: scale(1.1);
    }

    @media (max-width: 768px) {
        .footer .text-md-right {
            text-align: center !important;
        }

        .footer .social-icon {
            margin-right: 15px;
        }
    }
</style>
</html>

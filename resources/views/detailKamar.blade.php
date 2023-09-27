<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
    <div class="container-xxl bg-white p-0">
       <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Header Start -->
    <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Kos</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.html" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0 ">
                                <a href="/" class="nav-item nav-link ">Home</a>
                                <a href="/availability" class="nav-item nav-link active">Kamar</a>
                            </div>
                            <a href="/login" class="nav-item nav-link"><button type="button" class="btn btn-sm text-light" style="background-color: orange">Masuk</button></a>
                            <a href="/register" class="nav-item nav-link" style="margin-left: -0.4cm"><button type="button" class="btn btn-outline-primary btn-sm">Buat Akun</button></a>
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->


  



        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Kamar Tersedia</h6>
                    <h1 class="mb-5">Detail<span class="text-primary text-uppercase"> Kamar</span></h1>
                </div>

               
                <div class="row mb-5 justify-content-start">
               
                    <div class="col-md-6">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="p-4 mt-2">
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousel-inner" >
                                        <div class="carousel-item active">
                                        <img src="../image/coba gambar.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="../image/coba gambar.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="../image/coba gambar.jpg" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mt-3">
                        <h3 class="text-secondary mt-2">Nomor Kamar : {{$kamar->nomor_kamar}} </h3>
                        <p class="fs-4">Tipe :</p>
                        <p class="fs-2 text-danger">Rp. {{ $kamar->harga }}</p>
                        {{-- <a href="/login" class="nav-item nav-link"><button type="button" class="btn btn-danger btn-sm" style="background-color: orange">Masuk</button></a> --}}
                        <a href="/login" type="button" class="btn text-light rounded-5 mt-5" style="background-color: orange; width:5cm">Pesan</a>
                    </div>
                    
                </div>
                <div class="row mb-5 justify-content-center">
                    <h3 style="color: orange">Deskripsi Kamar</h3>
                </div>
                <div class="row mb-5 justify-content-center">
                    <h3 style="color: orange">Peraturan Kos</h3>
                    <div>
                    <ul>
                        <li>Jam malam diberlakukan setiap hari pukul 22:00 - 07:00 WIB. Apabila ada keperluan mendesak, dapat menghubungi PIHAK KOS.</li>
                        <li>Tamu lawan jenis dilarang masuk kedalam kos. Apabila kuliarga terdekat (Ayah, Abang laki-laki, atau Adik laki-laki) ingin mengunjungi, silahkan meminta izin di grup WhatsApp Kos.</li>
                        <li>Tidak diperbolehkan membawa dispenser ke dalam kamar untuk meminimalisir potensi kebaran.</li>
                        <li>Tidak diperkenankan untuk memindah sewakan kos atau memberikan perubahan dan tambahan fasilitas pada bangunan yang disewakan, kecuali atas izin PIHAK KOS</li>
                        <li>Untuk pemutusan masa kontrak, harusn memberitahu PIHAK KOS selambat-lambatnya sebulan sebelum pemutusan masa kontrak dilakukan.</li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <!-- Room End -->





    
        

           <!-- Footer Start -->
   
        <div class="container-fluid bg-dark text-light footer wow fadeIn mt-5" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-6">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-primary rounded p-4">
                            <a href="index.html"><h1 class="text-white text-uppercase mb-3">Hotelier</h1></a>
                            <p class="text-white mb-0">
								Download <a class="text-dark fw-medium" href="https://htmlcodex.com/hotel-html-template-pro">Hotelier – Premium Version</a>, build a professional website for your hotel business and grab the attention of new visitors upon your site’s launch.
							</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="row gy-5 g-4">
                           
                            <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">kamu dapatkan</h6>
                                <p class="mb-2"><i class=""></i>Bersih</p>
                                <p class="mb-2"><i class=""></i>Tempat parkir aman</p>
                                <p class="mb-2"><i class=""></i>Dekat dengan Universitas UIR</p>
                            </div>
                             <div class="col-md-6">
                                <h6 class="section-title text-start text-primary text-uppercase mb-4">follow us</h6>
                                <div class="d-flex pt-2">
                                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>   
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            {{-- <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
   

        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
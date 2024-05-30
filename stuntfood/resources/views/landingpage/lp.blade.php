<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bootslander Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/public/template landding page/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('/public/template landding page/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/public/template landding page/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('/public/template landding page/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/public/template landding page/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('/public/template landding page/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/public/template landding page/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/public/template landding page/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('/public/template landding page/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/public/template landding page/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html"><span>Stuntfood</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#info">Apa itu Stunting</a></li>
          <li><a class="nav-link scrollto" href="#konsep">Konsep Isi Piring</a></li>
          <li><a class="nav-link scrollto" href="#fitur">Fitur Aplikasi</a></li>
          {{-- <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li> --}}
          <li class="dropdown"><a href="#"><span>Artikel</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          {{-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ========== -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>Selamat datang di website <span>StuntFood</span></h1>
            <h2>Sistem rekomendasi menu makanan untuk pencegahan stunting pada balita menggunakan metode weighted product</h2>
            <div class="text-center text-lg-start">
              <a href="{{ route('form_user') }}" class="btn-get-started scrollto">Get Started</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 baby2-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="{{ asset('/public/template landding page/assets/img/isi.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="info" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-4 col-lg-4  d-flex justify-content-center align-items-stretch " data-aos="fade-right">
            <img src="{{ asset('/public/assets/img/gambar/cs.png')}}" width="500" height="500" >
            {{-- <a href="https://www.youtube.com/watch?v=StpBR2W8G5A" class="glightbox play-btn mb-4"></a> --}}
          
          </div>

          <div class="col-xl-8 col-lg-8 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-3 px-lg-5" data-aos="fade-left">

          <h3>Apa itu Stunting?</h3>
            <p>Stunting adalah kondisi yang ditandai dengan kurangnya tinggi badan anak apabila dibandingkan dengan anak-anak seusianya.   Sederhananya, stunting merupakan sebutan bagi gangguan pertumbuhan pada anak.
              Penyebab utama dari stunting adalah kurangnya asupan nutrisi selama masa pertumbuhan anak. Banyak yang tidak menyadari bahwa tinggi pendeknya anak bisa menjadi tanda adanya masalah gizi kronis.
              Perlu diingat bahwa anak pendek belum tentu mengalami stunting. Namun anak yang mengidap stunting pasti berperawakan pendek. Anak dengan asupan gizi terbatas sejak kecil dan telah berlangsung lama berisiko mengalami pertumbuhan yang terhambat.
            </p>

          <h3>Cara Mencegah Stunting?</h3>
            <p>  
              Cara mencegah stunting dapat dilakukan dengan menerapkan beberapa upaya berikut ini:
              <ol>
                <li>Memastikan anak memakan buah dan sayur yang sehat</li>
                <li>Mencukupi asupan gizi sejak pembuahan sel telur hingga anak berusia 2 tahun</li>
                <li>Memberikan ASI eksklusif hingga bayi berumur 6 bulan</li>
                <li>Mengusahakan anak mendapatkan imunisasi lengkap</li>
              </ol>             
            </p>
      </div>
    </section>
    <!-- End About Section -->

    <!-- ======konsep isi piring ===== -->
    <section id="konsep" class="about">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-7 col-lg-7  d-flex justify-content-center align-items-stretch " data-aos="fade-right">
            <img src="{{ asset('/public/assets/img/gambar/gambarposter.jpg')}}" width="700" height="500" >
          </div>
          <div class="col-xl-5 col-lg-5 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-3 px-lg-5" data-aos="fade-left">
          <h3>Isi Piringku Balita 2-5 Tahun</h3>
          <p>
             Pada usia 2-5 tahun, lima aspek utama yang perlu diperhatikan yaitu kemampuan berbahasa, kemampuan sensorik, kemampuan kognitif, kemampuan fisik serta kemampuan sosial emosional.
          </p>
            <p>Berdasarkan survei studi status Gizi Indonesia, prevalensi stunting atau gizi buruk di indonesia saat ini mencapai 24,4 persen,  isi piringku merupakan suatu program dari pemerintah untuk mengetahui bagaimana porsi makan yang tepat untuk memenuhi kebutuhan gizi. salah satu penunjang kebutuhan gizinya. melalui program isi piringku dengan harapan kebutuhan gizi balita tercukupi dan bebas dari permasalahan gizi buruk.
            </p>
            <p>
              Adapun dalam anjuran program ISI PIRINGKU untuk balita usia 2-5 tahun ialah dalam memberikan makanan utama adalah3-4 kali sehari, dan 1-2 kali makanan selingan, Protein Hewani, dimana protein hewani dinilai efektif dalam mencegah anak mengalami stunting. 
            </p>
          </div>
        </div>
    </section>
    <!--  ======end isi piring ===== -->

   <!-- ======= Fitur Aplikasi ======= -->
   <section id="fitur" class="about">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-5 col-lg-5 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-3 px-lg-5" data-aos="fade-left">
        <h3>Fitur Aplikasi_ _ _ _</h3>
        
        <p>
           Pada usia 2-5 tahun, lima aspek utama yang perlu diperhatikan yaitu kemampuan berbahasa, kemampuan sensorik, kemampuan kognitif, kemampuan fisik serta kemampuan sosial emosional.
        </p>
          
        </div>
      </div>
  </section>
    <!-- ===== End Fitur Aplikasi ==== -->


  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  {{-- <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Bootslander</h3>
              <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Bootslander</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer --> --}}

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/public/template landding page/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('/public/template landding page/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('/public/template landding page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/public/template landding page/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('/public/template landding page/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('/public/template landding page/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/public/template landding page/assets/js/main.js') }}"></script>

</body>

</html>
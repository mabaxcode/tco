<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>TCO - Tuition Centre Organizer</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets-landing/img/favicon.png" rel="icon">
  <link href="assets-landing/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets-landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets-landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets-landing/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets-landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets-landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets-landing/css/main.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/iziToast/dist/css/iziToast.min.css">
  <link rel="stylesheet" href="assets/iziToast/dist/css/iziToast.css">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="<?php echo base_url(); ?>" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets-landing/img/logo.png" alt=""> -->
        <h4 class="sitename">TCO - Tuition Centre Organizer</h4>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- <a class="btn-getstarted" href="<?php echo base_url('register/create_account') ?>">Create an account</a> -->

    </div>
  </header>

  <main class="main">

    <section id="faq-2" class="faq-2 section light-background contact section call-to-action">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Login</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

         

          <div class="col-lg-5">
            <form action="<?php echo base_url('login/login_process'); ?>" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-12">
                  <label for="email-field" class="pb-2">Username</label>
                  <input type="text" class="form-control" name="username" id="email-field" required="" value="<?php echo set_value('username');?>">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Password</label>
                  <input type="password" class="form-control" name="password" id="subject-field" required="">
                </div>

                <?php if($this->session->flashdata('error')): ?>
                  <div class="alert alert-danger fade show" role="alert">
                    <strong>Sorry !</strong> <?php echo $this->session->flashdata('error'); ?>
                  </div>
                <?php endif; ?>

                <div class="col-md-12">
                    <h6>New to TCO ? <a href="<?php echo base_url('register/create_account') ?>">Create an account</a> </h6> 
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit">Login</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Faq 2 Section -->

  </main>

  <footer id="footer" class="footer">


    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="<?php echo base_url(); ?>" class="d-flex align-items-center">
            <span class="sitename"><small>Tuition Centre Organizer</small></span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">TCO</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets-landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets-landing/vendor/aos/aos.js"></script>
  <script src="assets-landing/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets-landing/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets-landing/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets-landing/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets-landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets-landing/js/main.js"></script>
  <script src="assets/iziToast/dist/js/iziToast.min.js" type="text/javascript"></script>
  <script src="assets/iziToast/dist/js/iziToast.js" type="text/javascript"></script>
</body>

</html>
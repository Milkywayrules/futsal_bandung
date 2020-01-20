

<?php

  // ambil privilege dari session u/ tau jenis akun yg sedang login
  $dashboard = $this->session->userdata('privilege');
  // jika bukan superadmin yg login, maka
  // tambah m (member) atau p (provider) dan "/dashboard" pada akhir url
  if ($dashboard != 'superadmin') {
    $dashboard = substr($dashboard, 0, 1);
    $dashboard = "{$dashboard}/dashboard";
  }

 ?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href=<?php echo base_url("assets/img/icontab/futsal2.png") ?>>

  <title>{NAMA PROVIDER}</title>

  <!-- Custom fonts for this theme -->
  <link href=<?php echo base_url("assets/vendor/fontawesome-free/css/all.min.css") ?> rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href=<?php echo base_url("assets/css/freelancer.min.css") ?> rel="stylesheet">

  <!-- Codebase Core JS -->
  <script src=<?php echo base_url('assets/js/plugins/sweetalert2/sweetalert.min.js') ?>></script>



</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">{NAMA PROVIDER}</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#lapangan">Daftar Lapangan</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Tentang</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Kontak</a>
          </li>
        </ul>
        <?php if ($this->session->userdata('isLogin') == 0): ?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="btn btn-sm btn-secondary py-3 px-0 px-lg-3" href=<?php echo base_url("login") ?> style="font-weight:700;">Login</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="btn btn-sm btn-secondary py-3 px-0 px-lg-3" href=<?php echo base_url("daftar") ?> style="font-weight:700;">Daftar</a>
            </li>
          </ul>
        <?php endif; ?>
        <?php if ($this->session->userdata('isLogin') == 1): ?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="btn btn-sm btn-secondary py-3 px-0 px-lg-3" href=<?php echo base_url("{$dashboard}") ?> style="font-weight:700;">Dashboard</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="btn btn-sm btn-secondary py-3 px-0 px-lg-3" href=<?php echo base_url("logout") ?> style="font-weight:700;">Logout</a>
            </li>
          </ul>
        <?php endif; ?>

      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <div class="row justify-content-center pb-3 px-5">
        <img src=<?php echo base_url("assets/img/logoprovider/pro_campnou.png") ?> alt="logo provider" width="150px">
      </div>

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">{NAMA PROVIDER}</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">{LOKASI PROVIDER}</p>

    </div>
  </header>

  <!-- lapangan Section -->
  <section class="page-section portfolio" id="lapangan">
    <div class="container">

      <!-- lapangan Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Daftar Lapangan</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- lapangan Grid Items -->
      <div class="row">

        <!-- lapangan Item 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#lapanganModal1">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src=<?php echo base_url("assets/img/lapangan/1.png") ?> alt="">
          </div>
        </div>

        <!-- lapangan Item 2 -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#lapanganModal2">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src=<?php echo base_url("assets/img/lapangan/2.png") ?> alt="">
          </div>
        </div>

        <!-- lapangan Item 3 -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#lapanganModal3">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src=<?php echo base_url("assets/img/lapangan/3.png") ?> alt="">
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>
  </section>

  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">Tentang</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead">Lapangan ini dulunya diduduki oleh majapahit dan sriwijaya yang berperang dengan inggris dan juga belanda</p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">Sayangnya tanah sunda tidak seperti dulu kala yang dimana selalu jaya</p>
        </div>
      </div>

      <!-- About Section Button -->
      <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="http://ringkes.in">
          <i class="fas fa-download mr-2"></i>
          Bonjour !
        </a>
      </div>

    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Hubungi Kami</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nama</label>
                <input class="form-control" id="nama" type="text" placeholder="Nama" required="required" data-validation-required-message="Silakan masukkan nama anda.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>E-mail</label>
                <input class="form-control" id="email" type="email" placeholder="E-mail" required="required" data-validation-required-message="Silakan masukkan E-mail anda.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nomor Telepon</label>
                <input class="form-control" id="noTelp" type="tel" placeholder="Nomor Telepon" required="required" data-validation-required-message="Silakan masukkan nomor telepon anda.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Isi Pesan</label>
                <textarea class="form-control" id="pesan" rows="5" placeholder="Isi Pesan" required="required" data-validation-required-message="Silakan masukkan pesan yang akan disampaikan."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">{LOKASI LAPANGAN}</h4>
          <p class="lead mb-0">2215 John Daniel Drive
            <br>Clark, MO 65243</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">{KANAL INFORMASI LAINNYA}</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">{ISI APA KEK DISINI SABEB}</h4>
          <p class="lead mb-0">Ringkesin link website kamu yang panjang hanya di
            <a href="http://ringkes.in">Ringkesin</a>.</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <span>Copyright &copy; futsalbandung.com 2020</span>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- lapangan Modals -->

  <!-- lapangan Modal 1 -->
  <div class="portfolio-modal modal fade" id="lapanganModal1" tabindex="-1" role="dialog" aria-labelledby="lapanganModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- lapangan Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">SynThesis</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- lapangan Modal - Image -->
                <img class="img-fluid rounded mb-5" src="assets/img/lapangan/1.png" alt="">
                <!-- lapangan Modal - Text -->
                <p class="mb-5">Lapngan ini enak dipake buat beduaan apalagi buat ngentot</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- lapangan Modal 2 -->
  <div class="portfolio-modal modal fade" id="lapanganModal2" tabindex="-1" role="dialog" aria-labelledby="lapanganModal2Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- lapangan Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Vynyl</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- lapangan Modal - Image -->
                <img class="img-fluid rounded mb-5" src="assets/img/lapangan/2.png" alt="">
                <!-- lapangan Modal - Text -->
                <p class="mb-5">Lapangan ini juga enak dipake ngentot</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- lapangan Modal 3 -->
  <div class="portfolio-modal modal fade" id="lapanganModal3" tabindex="-1" role="dialog" aria-labelledby="lapanganModal3Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- lapangan Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Interlock</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- lapangan Modal - Image -->
                <img class="img-fluid rounded mb-5" src="assets/img/lapangan/3.png" alt="">
                <!-- lapangan Modal - Text -->
                <p class="mb-5">Enaknya buat cuddling inimahsi</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- lapangan Modal 4 -->
  <div class="portfolio-modal modal fade" id="lapanganModal4" tabindex="-1" role="dialog" aria-labelledby="lapanganModal4Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- lapangan Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Controller</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- lapangan Modal - Image -->
                <img class="img-fluid rounded mb-5" src="assets/img/lapangan/game.png" alt="">
                <!-- lapangan Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- lapangan Modal 5 -->
  <div class="portfolio-modal modal fade" id="lapanganModal5" tabindex="-1" role="dialog" aria-labelledby="lapanganModal5Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- lapangan Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Locked Safe</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- lapangan Modal - Image -->
                <img class="img-fluid rounded mb-5" src="assets/img/lapangan/safe.png" alt="">
                <!-- lapangan Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- lapangan Modal 6 -->
  <div class="portfolio-modal modal fade" id="lapanganModal6" tabindex="-1" role="dialog" aria-labelledby="lapanganModal6Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">
            <i class="fas fa-times"></i>
          </span>
        </button>
        <div class="modal-body text-center">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <!-- lapangan Modal - Title -->
                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Submarine</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- lapangan Modal - Image -->
                <img class="img-fluid rounded mb-5" src="assets/img/lapangan/submarine.png" alt="">
                <!-- lapangan Modal - Text -->
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                <button class="btn btn-primary" href="#" data-dismiss="modal">
                  <i class="fas fa-times fa-fw"></i>
                  Close Window
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- sweetalert modal notification -->
  <?php if ($this->session->flashdata('success_message')): ?>
    <script>
    swal({
      title: "<?php echo $this->session->title; ?>",
      text: "<?php echo $this->session->text; ?>",
      timer: 3000,
      button: false,
      icon: 'success'
    });
    </script>
  <?php endif; ?>
  <?php if ($this->session->flashdata('failed_message')): ?>
    <script>
      swal({
         title: "<?php echo $this->session->title; ?>",
         text: "<?php echo $this->session->text; ?>",
         timer: 3000,
         button: false,
         icon: 'error'
      });
    </script>
  <?php endif; ?>
  <!-- sweetalert end -->

  <!-- Bootstrap core JavaScript-->
  <script src=<?php echo base_url("assets/template/sbadmin/vendor/jquery/jquery.min.js"); ?>></script>
  <script src=<?php echo base_url("assets/template/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>></script>

  <!-- Core plugin JavaScript-->
  <script src=<?php echo base_url("assets/template/sbadmin/vendor/jquery-easing/jquery.easing.min.js"); ?>></script>

  <!-- Contact Form JavaScript -->
  <script src=<?php echo base_url("assets/js/jqBootstrapValidation.js") ?>></script>
  <script src=<?php echo base_url("assets/js/contact_me.js") ?>></script>

  <!-- Custom scripts for this template -->
  <script src=<?php echo base_url("assets/js/freelancer.min.js") ?>></script>

</body>

</html>

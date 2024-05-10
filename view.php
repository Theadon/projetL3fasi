<?php
session_start();

$conn = new PDO('mysql:host=localhost;dbname=db','adonis','');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $conn->prepare('SELECT * FROM conducteur_list WHERE srno = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="effets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="effets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="effets/vendor/aos/aos.css" rel="stylesheet">
    <link href="effets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="photos/boby.jpg" rel="icon">
  <link href="photos/boby.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link href="effets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="effets/css/main.css" rel="stylesheet">
     <!-- ======= Header ======= -->
     <section id="topbar" class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
          <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:adonisbamani6@gmail.com">adonisbamani6@gmail.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>(+243) 808 334 029</span></i>
          </div>
          <div class="social-links d-none d-md-flex align-items-center">
            <a href="https://twitter.com/Syprome1" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/Syprome" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/Syprome_rdc" class="instagram"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
      </section><!-- End Top Bar -->
    
      <header id="header" class="header d-flex align-items-center">
    
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
          <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>Driver Licence Online<span>.</span></h1>
          </a>
          <nav id="navbar" class="navbar">
            <ul>
              <li><a href="admin.php?username=<?=$_SESSION['admin_nom'];?>">Accueil</a></li>
              <li><a href="#">Rapport</a></li>
              <li><a href="#">Statistiques</a></li>
            </ul>
          </nav><!-- .navbar -->
    
          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    
        </div>
      </header><!-- End Header -->
      <!-- End Header -->

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($userinfo['image']) . '"style="width: 150px; height: 170px; border-radius: 50%;" alt=""/>'; ?>
                        </div>
                    </div><br><br>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?php echo $userinfo['nom']?> <?php echo $userinfo['postnom']?> <?php echo $userinfo['prénom']?>
                                    </h5>
                                    <h6>
                                    <?php echo $userinfo['lieu_naissance']?>
                                    </h6>
                                   
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Srno</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userinfo['srno']?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nationalité</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userinfo['nationalite']?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date de naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userinfo['date_naissance']?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Adresse</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userinfo['adresse']?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Numéro du permis</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userinfo['num_permis']?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Catégories</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userinfo['categories']?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Etat du permis</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userinfo['etat_permis']?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date de délivrance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userinfo['delivery_date']?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date d'expiration</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userinfo['expiry_date']?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="images/1.jpg" style="width:135px; height:85px;" alt="">
                        </div>
                    </div><br><br>
                </div>
            </form>           
        </div>

         <footer id="footer" class="footer">
  
            <div class="container">
              <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                  <a href="index.html" class="logo d-flex align-items-center">
                    <span>Call_center</span>
                  </a>
                  <p>« Rendez vous chez Call_center pour 
                    vous procurer un permis de conduire ! »</p>
                  <div class="social-links d-flex mt-4">
                    <a href="https://twitter.com/Syprome1" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="https://www.facebook.com/Syprome" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/Syprome_rdc" class="instagram"><i class="bi bi-instagram"></i></a>
                  </div>
                </div>
        
                <div class="col-lg-2 col-6 footer-links">
                  <h4>Liens utils</h4>
                  <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#about">A propos</a></li>
                    <li><a href="#">Services</a></li>
                  </ul>
                </div>
        
                <div class="col-lg-2 col-6 footer-links">
                  <h4>Nos Services</h4>
                  <ul>
                    <li><a href="#">Création des permis</a></li>
                    <li><a href="#">Asisstance</a></li>
                    
                  </ul>
                </div>
        
                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                  <h4>Contactez-nous</h4>
                  <p>
                  Université Protestante au Congo,Av LINGWALA <br>
                    KINSHASA-RDC <br><br>
                    <strong>Phone:</strong> (+243) 852 966 368<br>
                    <strong>Email:</strong> <a href="mailto:ekindenkanirocher@gmail.com">mongakionis@gmail.com</a><br>
                  </p>
        
                </div>
        
              </div>
            </div>
        
            <div class="container mt-4">
              <div class="copyright">
                &copy; Copyright <strong><span>Call_center ASBL</span></strong>. All Rights Reserved
              </div>
              <div class="credits"> 
                Designed by <a href="#">Outsiders</a>
              </div>
            </div>
        
          </footer><!-- End Footer -->
          <!-- End Footer -->
          
            <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
          
            <div id="preloader"></div>
        
        
        
        
        
            <!-- Vendor JS Files -->
            <script src="effets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="effets/vendor/aos/aos.js"></script>
            <script src="effets/vendor/glightbox/js/glightbox.min.js"></script>
            <script src="effets/vendor/purecounter/purecounter_vanilla.js"></script>
            <script src="effets/vendor/swiper/swiper-bundle.min.js"></script>
            <script src="effets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
            <script src="effets/vendor/php-email-form/validate.js"></script>
            
          
            <!-- Template Main JS File -->
            <script src="effets/js/main.js"></script>
            
</body>
</html>

<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        background-color: #f2f2f2;
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}

.sigma {
        text-decoration:none;
        text-align: center;
        padding:  10px 20px;
        background-color: blue;
        border-radius: 10px;
        color:white;
    }
    .sigma:hover {
        color: yellow;
        transition: 0.5s;
    }
</style>
<?php    
    }
?>
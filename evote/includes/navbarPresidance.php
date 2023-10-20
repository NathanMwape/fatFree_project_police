<!-- ======= Header ======= -->
<?php 
if(!isset($_SESSION))
{
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>evote</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../assets/template/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../assets/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/template/images/favicon.png" />
</head>
<body>
 
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
        <a class="navbar-brand brand-logo">
           <h1>E-vote</h1>
       </a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../assets/template/images/Capture d’écran 2023-09-20 231309.png" alt="profile"/>
              <span class="nav-profile-name">Bureau Etudiant</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="../controller/admdecon.php">
                <i class="typcn typcn-eject text-primary" ></i>
                Se déconnecter
              </a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-date dropdown">
            <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
              <h6 class="date mb-0">Today : <?php echo date('d-m-y');?></h6>
              <i class="typcn typcn-calendar"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close typcn typcn-times"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">  
          <li class="nav-item">
            <a class="nav-link" href="../view/organiserElectionPresidance.php" >
            <i class="typcn typcn-calendar-outline menu-icon"></i>
              <span class="menu-title">Organiser élection</span>
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../view/dashboardPresidence.php">
            <i class="typcn typcn-document-text menu-icon"></i>
              <span class="menu-title">Candidatures reçues</span>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../view/resultatPresidance.php" >
            <i class="typcn typcn-chart-pie-outline menu-icon"></i>
              <span class="menu-title">résultat de votes</span>
            </a>
           
          </li>
        </ul>
      </nav>
      <!-- partial -->
      </body>

</html>
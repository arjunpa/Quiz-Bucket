<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="<?php echo $site_title; ?> dashboard">

      <title>Quiz - Free | <?php echo $site_title; ?> Dashboard</title>

      <link href="<?php echo site_url('dashboard/css/bootstrap.css'); ?>" rel="stylesheet">
      <link href="<?php echo site_url('dashboard/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />

      <link href="<?php echo site_url('dashboard/css/style.css'); ?>" rel="stylesheet">
      <link href="<?php echo site_url('dashboard/css/style-responsive.css'); ?>" rel="stylesheet">

      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>

   <body>

      <section id="container" >         

         <header class="header black-bg" id="top">
            <div class="sidebar-toggle-box">
               <div class="fa fa-bars"></div>
            </div>
            <a href="<?php echo site_url('admin'); ?>" class="logo"><b><?php echo $site_title; ?></b></a>
            <div class="top-menu">
               <ul class="nav pull-right top-menu">
                  <li><?php echo anchor('user/logout', 'Logout', 'class="logout"'); ?></li>
               </ul>
            </div>
         </header>
         
         <aside>
            <div id="sidebar"  class="nav-collapse ">
               <ul class="sidebar-menu" id="nav-accordion">
                 <p class="centered"><a href="<?php echo site_url('admin'); ?>"><img src="<?php echo site_url('dashboard/img/logo.jpg'); ?>" class="img-circle" width="60"></a></p>
                 <h5 class="centered"><?php echo ucwords($session['username']); ?></h5>

                  <li class="mt">
                     <a href="<?php echo site_url('admin'); ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                     </a>
                  </li>
                  <li class="sub-menu">
                     <a class="active" href="javascript:;" >
                        <i class="fa fa-question"></i>
                        <span>Quiz</span>
                     </a>
                     <ul class="sub">
                        <li><a href="<?php echo site_url('admin/quiz/paid'); ?>">Paid Quiz</a></li>
                        <li class="active"><a href="<?php echo site_url('admin/quiz/free'); ?>">Free Quiz</a></li>
                        <li><a href="<?php echo site_url('admin/quiz/archive'); ?>">Archive</a></li>
                     </ul>
                  </li>
                  <li class="sub-menu">
                     <a href="<?php echo site_url('admin/results'); ?>">
                        <i class="fa fa-check"></i>
                        <span>Results</span>
                     </a>
                  </li>
                  <li class="sub-menu">
                     <a href="javascript:;" >
                        <i class="fa fa-archive"></i>
                        <span>Question Bank</span>
                     </a>
                     <ul class="sub">
                        <li><a href="<?php echo site_url('admin/question_bank/questions'); ?>">Questions</a></li>
                        <li><a href="<?php echo site_url('admin/question_bank/tags'); ?>">Tags</a></li>
                     </ul>
                  </li>
                  <li class="sub-menu">
                     <a href="<?php echo site_url('admin/current_affairs'); ?>">
                        <i class="fa fa-check"></i>
                        <span>Current Affairs</span>
                     </a>
                  </li>
                  <li class="sub-menu">
                     <a href="<?php echo site_url('admin/users'); ?>">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                     </a>
                  </li>
               </ul>
            </div>
         </aside>

         <section id="main-content">
            <section class="wrapper">

               <h3 class="page-side-heading"><i class="fa fa-angle-right"></i> <a href="<?php echo site_url('admin/quiz'); ?>">Quiz</a> <i class="fa fa-angle-right"></i> <a href="<?php echo site_url('admin/quiz/free'); ?>">Free</a></h3>
               
               <?php
               if (empty($quiz)) {
                  echo '<div class="row mt">';
                  echo '<div class="col-lg-12">';
                  echo '<div class="showback text-center">';
                  echo '<h4>No Free Quiz to display!</h4>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
               } else {
                  $count = 0;
                  echo '<div class="row">';
                  echo '<div class="col-lg-12">';

                  foreach ($quiz as $q) {
                     if($count % 3 == 0) {
                        echo '<div class="row mt">';
                     }
                     
                     $count += 1;
                     
                     echo '<div class="col-md-4 col-sm-4 mb">';
                     echo '<div class="white-panel pn">';
                     echo '<div class="white-header-free">';
                     echo '<h5>';
                     echo anchor(site_url('admin/quiz/'.$q->id), $q->title);
                     echo '<div class="btn-set">';
                     echo '<a href="'.site_url('admin/quiz/change_active/'.$q->id).'" style="padding-right: 5px;"><button class="btn btn-success btn-xs fa fa-check tooltips" data-placement="left" data-original-title="Activate/Deactivate"></button></a>';
                     echo '<a href="'.site_url('admin/quiz/edit/'.$q->id).'" style="padding-right: 5px;"><button class="btn btn-primary btn-xs fa fa-pencil tooltips" data-placement="bottom" data-original-title="Edit"></button></a>';
                     echo '<a href="'.site_url('admin/quiz/delete/'.$q->id).'"><button class="btn btn-danger btn-xs fa fa-trash-o tooltips" data-placement="right" data-original-title="Delete"></button></a>';
                     echo '</div>';
                     echo '</h5>';
                     echo '</div>';
                     if($q->active == 1) {
                        echo '<p><span class="label label-info">Active</span></p>';
                     } else {
                        echo '<p><span class="label label-warning">Deactive</span></p>';
                     }
                     echo '<div class="row">';
                     echo '<div class="col-md-6">';
                     echo '<p class="small mt">Time duration</p>';
                     $start_time = new DateTime($q->date.' '.$q->start_time);
                     $end_time = new DateTime($q->date.' '.$q->end_time);
                     $diff = $start_time->diff($end_time);
                     $h = $diff->format('%h');
                     $m = $diff->format('%i');
                     $s = $diff->format('%s');
                     echo '<p>'.$h.'h '.$m.'m '.$s.'s</p>';
                     echo '</div>';
                     echo '<div class="col-md-6">';
                     echo '<p class="small mt">Total questions</p>';
                     echo '<p>'.$quiz_total[$q->id].'</p>';
                     echo '</div>';
                     echo '</div>';
                     echo '<div class="row">';
                     echo '<div class="col-md-12">';
                     echo '<p class="small mt">Created date</p>';
                     echo '<p>'.substr($q->time_stamp, 0, 10).'</p>';
                     echo '</div>';
                     echo '</div>';
                     echo '</div>';
                     echo '</div>';

                     if($count % 3 == 0) {
                        echo '</div>';
                     }
                  }
                  if($count % 3 != 0) {
                     echo '</div>';
                  }

                  echo '</div>';
                  echo '</div>';
               }
               ?>

            </section>

            <footer class="site-footer">
               <div class="text-center">
                  Powered by Quastio &trade;
                  <a href="#top" class="go-top"><i class="fa fa-angle-up"></i></a>
               </div>
            </footer>

         </section>
      </section>

      <script src="<?php echo site_url('dashboard/js/jquery.js'); ?>"></script>
      <script src="<?php echo site_url('dashboard/js/bootstrap.min.js'); ?>"></script>
      <script class="include" type="text/javascript" src="<?php echo site_url('dashboard/js/jquery.dcjqaccordion.2.7.js'); ?>"></script>
      <script src="<?php echo site_url('dashboard/js/jquery.scrollTo.min.js'); ?>"></script>
      <script src="<?php echo site_url('dashboard/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>

      <script src="<?php echo site_url('dashboard/js/common-scripts.js'); ?>"></script>

   </body>
</html>
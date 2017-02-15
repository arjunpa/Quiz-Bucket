<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="<?php echo $site_title; ?> dashboard">

      <title><?php echo $quiz->title.' Result | <?php echo $site_title; ?> Dashboard'; ?></title>

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
                     <a href="javascript:;" >
                        <i class="fa fa-question"></i>
                        <span>Quiz</span>
                     </a>
                     <ul class="sub">
                        <li><a href="<?php echo site_url('admin/quiz/paid'); ?>">Paid Quiz</a></li>
                        <li><a href="<?php echo site_url('admin/quiz/free'); ?>">Free Quiz</a></li>
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

               <h3 class="page-side-heading"><i class="fa fa-angle-right"></i> <a href="<?php echo site_url('admin/results'); ?>">Results</a> <i class="fa fa-angle-right"></i> <a href="<?php echo site_url('admin/results/'.$quiz->id); ?>"><?php echo $quiz->title; ?></a></h3>

               <div class="row">
                     <div class="form-panel">
                        <div class="row mt">
                           <div class="col-lg-12">
                              <div class="col-md-4 col-sm-4">
                                 <h4>Description:</h4>
                                 <p><?php echo $quiz->description; ?></p>
                              </div>

                              <div class="col-md-4 col-sm-4">
                                 <p><span>Slug: </span><?php echo $quiz->slug; ?></p>
                                 <p><span>Pubdate: </span><?php echo $quiz->date; ?></p>
                                 <p><span>Time: </span><?php echo $quiz->start_time.' to '.$quiz->end_time; ?></p>
                              </div>

                              <div class="col-md-4 col-sm-4">
                                 <p><span>Prize Money: </span><?php echo $quiz->prize_money; ?></p>
                                 <p><span>Cost: </span><?php echo $quiz->cost; ?></p>
                                 <p><span>Enrolled users: </span><?php echo $quiz_enrolled; ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>

               <?php
                  echo '<div class="row">';
                  echo '<div class="col-md-12 mt">';
                  echo '<div class="content-panel">';
                  echo '<table class="table table-hover">';
                  echo '<thead>';
                  echo '<tr>';
                  echo '<th>Rank</th>';
                  echo '<th><i class="fa fa-user"></i> First Name</th>';
                  echo '<th><i class="fa fa-user"></i> Last Name</th>';
                  echo '<th><i class="fa fa-info-circle"></i> Attempted</th>';
                  echo '<th><i class="fa fa-info-circle"></i> Total Correct</th>';
                  echo '<th><i class="fa fa-info-circle"></i> Correct Starred</th>';
                  echo '<th><i class="fa fa-info-circle"></i> Score</th>';
                  echo '</tr>';
                  echo '</thead>';
                  echo '<tbody>';
                  foreach ($result as $r) {
                     echo '<tr>';
                     echo '<td>'.$r->rank.'</td>';
                     echo '<td>'.anchor('admin/users/'.$r->user_id, $user[$r->user_id]->first_name).'</td>';
                     echo '<td>'.$user[$r->user_id]->last_name.'</td>';
                     echo '<td>'.$r->attempted.'</td>';
                     echo '<td>'.$r->total_correct.'</td>';
                     echo '<td>'.$r->correct_starred.'</td>';
                     echo '<td>'.$r->score.'</td>';
                     echo '</tr>';
                  }
                  echo '</tbody>';
                  echo '</table>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
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
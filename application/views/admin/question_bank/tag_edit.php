<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="<?php echo $site_title; ?> dashboard">

      <title><?php echo (empty($tag->name))? 'Add new Tag': 'Edit tag : '.$tag->name; ?> | <?php echo $site_title; ?> Dashboard</title>

      <link href="<?php echo site_url('dashboard/css/bootstrap.css'); ?>" rel="stylesheet">
      <link href="<?php echo site_url('dashboard/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
      <link href="<?php echo site_url('dashboard/css/jquery-ui.css'); ?>" rel="stylesheet">

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

               <h3 class="page-side-heading"><i class="fa fa-angle-right"></i> <?php echo (empty($tag->name))? 'Add new tag': 'Edit: '.anchor(site_url('admin/question_bank/tags/'.$tag->id), $tag->name); ?></h3>

               <div class="row">
                  <div class="col-lg-12">
                     
                     <div class="form-panel">

                        <?php echo form_open('', 'class="form-horizontal style-form"'); ?>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tag name</label>
                              <div class="col-sm-10">
                              <?php echo form_error('name'); ?>
                                 <?php echo form_input('name', set_value('name', $tag->name), 'class="form-control"'); ?>
                              </div>
                           </div>
                           
                           <?php echo form_submit('submit','Finish', 'class="btn btn-success"'); ?>

                        <?php echo form_close(); ?>

                     </div>

                  </div>

               </div>
            </section>

            <footer class="site-footer">
               <div class="text-center">
                  Powered by Quastio &trade;
                  <a href="#top" class="go-top"><i class="fa fa-angle-up"></i></a>
               </div>
            </footer>

         </section>
      </section>

      <script src="<?php echo site_url('dashboard/js/bootstrap.min.js'); ?>"></script>
      <script class="include" type="text/javascript" src="<?php echo site_url('dashboard/js/jquery.dcjqaccordion.2.7.js'); ?>"></script>
      <script src="<?php echo site_url('dashboard/js/jquery.scrollTo.min.js'); ?>"></script>
      <script src="<?php echo site_url('dashboard/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>

      <script src="<?php echo site_url('dashboard/js/common-scripts.js'); ?>"></script>

   </body>
</html>
<?php $this->benchmark->mark('code_start');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=base_url()?>/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?=base_url()?>/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?=base_url()?>/assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>/assets/ico/apple-touch-icon-72-precomposed.png">
                     <link rel="apple-touch-icon-precomposed" href="<?=base_url()?>/assets/ico/apple-touch-icon-57-precomposed.png">
                                    <link rel="shortcut icon" href="<?=base_url()?>/assets/ico/favicon.png">
   </head>

   <body>

     <div class="navbar navbar-inverse navbar-fixed-top">
       <div class="navbar-inner">
         <div class="container">
           <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="brand" href="<?=site_url('admin')?>">Admin</a>
   <ul class="nav pull-right">
                      <li><a href="<?=site_url('admin/auth/logout')?>">Logout</a></li>

   </ul>
         </div>
       </div>
     </div>

     <div class="container">

   <?
   echo validation_errors();
if($this->session->flashdata('message')) echo '<div class="alert">'.
                                           $this->session->flashdata('message').
                                           '</div>';

if($this->session->flashdata('message_error')) echo '<div class="alert alert-error">'.
                                           $this->session->flashdata('message_error').
                                           '</div>';

?>
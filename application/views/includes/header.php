<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
        <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Recursive</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse ">

                    <?php
                    if ($this->session->userdata('user_login') != ''): ?>
                    <?php if($this->session->userdata('user_login')['role'] == 1):?>
                      <div class="navbar-right">
                        <a href="<?php echo base_url('home/signup'); ?>"class="btn btn-success">My Orders</a>
                        <a href="<?php echo base_url('home/logout'); ?>"class="btn btn-success">Logout</a>
                    </div>   
                    <?php else:?>
                      <div class="navbar-right">
                        <a href="<?php echo base_url('home/product'); ?>"class="btn btn-success">Products</a>
                        <a href="<?php echo base_url('home/logout'); ?>"class="btn btn-success">Logout</a>
                    </div>   
                    <?php endif;?>
                    <?php else: ?>
                    <form class="navbar-form navbar-right" role="form" action="<?php echo base_url('home/login');?>" method="post">
                            <div class="form-group">
                                <input type="text" placeholder="Email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" class="form-control" name="password">
                            </div>
                            <button type="submit" class="btn btn-success">Sign in</button>
                            <a href="<?php echo base_url('home/signup'); ?>"class="btn btn-success">Sign up</a>
                        </form>

                    <?php endif; ?>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>
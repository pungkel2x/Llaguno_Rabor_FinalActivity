<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>">
</head>
<body>

    <!-- <?php echo validation_errors(); ?> -->
    <!-- <?php echo form_open('login_controller/login'); ?>    -->
    <div class="container"><br/><br/><br/>
        <form method="POST" action="<?php echo base_url("index.php/login_controller/login")?>" >
        <div class="form-group">
            <label for="username"><b>Enter Username</b></label>
            <input type="text" name="username" class="form-control">
            <span class="text-danger"><?php echo form_error('username') ?></span>
        </div>
        <div class="form-group">
            <label for="password"><b>Enter Password</b></label>
            <input type="text" name="password" class="form-control">
            <span class="text-danger"><?php echo form_error('password') ?></span>
        </div>
        <div class="form-group">  
            <button type="submit" name="btnLogin" class="btn btn-info">Login</button>
            <?php echo $this->session->flashdata("error"); ?>
        </div>
        </form>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>/bootstrap/css/bootstrap.min.js"></script>
</body>
</html>
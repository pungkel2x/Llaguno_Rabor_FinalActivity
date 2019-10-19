<html>
<head>
<title>Upload Form</title>
<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>">
</head>
<style>
nav{
    background-color:#f3f3f3;
}
ul{
    list-style:none;
    text-align:center;
}
li{
    display:inline-block;
}
</style>
<body>

<center>

<div class="container">
    <div>
        <nav>
            <ul >
                <li><h1>Welcome <?php echo $this->session->users["username"];?> !!</h1></li>
                <li style="float:right;"><a href="<?php echo base_url("index.php/login_controller/logout") ?>"><b>LOGOUT</b></a></li>
            </ul>
        </nav>
        
        
    </div>
    <?php echo $error;?>
    <?php echo form_open_multipart(base_url("index.php/upload_controller/do_upload")); ?>
    <div class="form-group" style="width:500px;">
    <input type="file" name="userfile" size="20" class="form-control"/>
    </div>
    <div class="form-group">
    <input type="submit" value="Upload" class="btn btn-primary" />
    </div><br>
    <?php echo $this->pagination->create_links(); ?><br>
    

    </form>
</div>
</center>
</body>
</html>
<!DOCTYPE Html>
<Html lang="vi">
  <head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
 
    <title>
    <?php echo $this->fetch('title'); ?>
    </title>
    <?php
		echo $this->Html->meta('icon'); // cho hien thi icon cua web minh thiet ke

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-theme.min');

		echo $this->Html->script('jquery-1.11.3.min');
		echo $this->Html->script('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

    <!-- Html5 shim and Respond.js for IE8 support of Html5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/Html5shiv/3.7.2/Html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <?php if($this->Session->check('session')){
    $user = $this->Session->read('session');
    if($user['User']['status'] != 0){ ?>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">FreshFood Admin</a>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2">
        <br>
        <br>
        <br>
        <?php
            echo $this->element('leftmenu')
        ?>
        </div>
        <div class="col-sm-9 col-md-10 ">
        <br>
        <br>
        <br>
 
          <?php echo $this->Session->flash(); ?>

         <?php echo $this->fetch('content'); ?></div>

        </div>
      </div>
    </div>


   <?php }else{ ?>

          <h4>Ban khong phai la admin</h4>
       
   

  <?php }
    }else{ 

   echo  'Ban chua dang nhap';
   echo "<meta http-equiv=\"refresh\" content=\"0;URL=/cakephp/users/login\">";
}

     ?>
    
  </body>
</Html>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css
">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js
"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js
"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js
"></script>

<div class="text-center">
<div class="p-3 mb-2 bg-secondary text-white center">
    <div>
    <h1><?php echo lang('login_heading');?></h1>   
    <p><?php echo lang('login_subheading');?></p>
    </div>

</div>
<div class="container">
    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("auth/login");?>

      <p>
        <?php echo lang('login_identity_label', 'identity');?>
        <?php echo form_input($identity);?>
      </p>

      <p>
        <?php echo lang('login_password_label', 'password');?>
        <?php echo form_input($password);?>
      </p>

      <p>
        <?php echo lang('login_remember_label', 'remember');?>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
      </p>

	  <button type="submit" id='login_submit_btn'class="btn btn-dark">Login</button>
      

    <?php echo form_close();?>

 <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>

</div>

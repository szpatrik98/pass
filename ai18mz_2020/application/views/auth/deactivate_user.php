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
<h1><?php echo lang('deactivate_heading');?></h1>
   <div class="topnav">
       <a href="<?php echo base_url() ?>auth/logout" class="btn btn-danger ">Logout  </a>
      <a href="<?php echo base_url() ?>musics/index" class="btn btn-danger ">Musics List</a>     
      <a href="<?php echo base_url() ?>films/index"class="btn btn-danger ">Films List</a>
    </div>

</div>
<div>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
<?php echo form_open("auth/deactivate/".$user->id);?>

  <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(array('id'=>$user->id)); ?>
  <button type="submit" id='deactivate_submit_btn'class="btn btn-dark">Deactivate</button>
  

<?php echo form_close();?>
</div>
</div>

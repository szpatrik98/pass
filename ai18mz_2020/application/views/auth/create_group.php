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
<h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p>
  <div class="topnav">
      <a href="<?php echo base_url() ?>auth/logout" class="btn btn-danger ">Logout  </a>
      <a href="<?php echo base_url() ?>musics/index" class="btn btn-danger ">Musics List</a>     
      <a href="<?php echo base_url() ?>films/index"class="btn btn-danger ">Films List</a>
    </div>
</div>
<div >
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_group");?>

      <p>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            <?php echo lang('create_group_desc_label', 'description');?> <br />
            <?php echo form_input($description);?>
      </p>
	  <button type="submit" id='create_group_submit_btn'class="btn btn-dark">Create</button>
      

<?php echo form_close();?>
</div>
</div>


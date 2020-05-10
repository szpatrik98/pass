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
    <h1>New Music</h1>      
</div>
<div>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart(); ?>
</br/><br/>
<?php echo form_label('Performer Name:','performer'); ?>
<?php echo form_input('performer',set_value('performer',''), ['placeholder' => 'performer'],[ 'id' => 'performer',]); ?>
<?php echo form_error('performer');?>
</br/><br/>
<?php echo form_label('Title of the music:','title'); ?>
<?php echo form_input('title',set_value('title',''), ['placeholder' => 'title']); ?>
<?php echo form_error('title'); ?>
</br/><br/>
<?php echo form_label('Time:','time'); ?>
<?php echo form_input('time',set_value('time',''), ['placeholder' => 'time']); ?>
<?php echo form_error('time'); ?>
</br/><br/>
<?php echo form_upload('photo'); ?>
<?php echo form_error('photo'); ?>
<?php echo isset($errors) ? $errors : ""; ?>
</br></br>
<button type="submit" id='submit'class="btn btn-dark">Send</button>

<?php echo form_close(); ?>
</div>
</div>

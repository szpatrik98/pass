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
    <h1>New Film</h1>      
</div>
<div>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
</br/><br/>
<?php echo form_label('Address:','address'); ?>
<?php echo form_input('address',set_value('address',''),[ 'id' => 'address',
                                  'required' => 'required', 'placeholder' => 'address']); ?>
<?php echo form_error('address');?>
</br/><br/>
<?php echo form_label('Type of the film:','type_of'); ?>
<?php echo form_input('type_of',set_value('type_of',''),[ 'id' => 'type_of',
                                  'required' => 'required', 'placeholder' => 'type_of']); ?>
<?php echo form_error('type_of'); ?>
</br/><br/>
<?php echo form_label('Time:','time'); ?>
<?php echo form_input('time',set_value('time',''), [ 'id' => 'time',
                                  'required' => 'required', 'placeholder' => 'time']); ?>
<?php echo form_error('time'); ?>
</br/><br/>

<button type="submit" id='submit'class="btn btn-dark">Send</button>

<?php echo form_close(); ?>
</div>
</div>

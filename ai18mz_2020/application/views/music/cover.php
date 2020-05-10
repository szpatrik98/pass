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
<h1><?=$cover->performer?></h1>
</div>

<?php echo img(['src' => base_url('/uploads/'.$cover->photo_path), 'alt' => 'Előadó képe']); ?>
<br/>

<table border="0">
    <tr>
        <th>Information</th>
        <th>Data</th>
    </tr>
    <tr>
        <td>Performer:</td> <td><?=$cover->performer?></td>
    </tr>
    <tr>
        <td>Title:</td> <td><?=$cover->title?></td>
    </tr>
    <tr>
        <td>Time:</td> <td><?=$cover->time?></td>
    </tr>
    <tr>
        <td>Photo:</td> <td><?=$cover->photo_path?></td>
    </tr>
</table>

<?=anchor(base_url('musics/index'),'Back.');?>

</div>

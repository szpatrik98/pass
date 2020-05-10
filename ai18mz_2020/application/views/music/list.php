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
    <h1>Musics</h1>      
	
	 <a href="<?php echo base_url() ?>auth/logout">Logout  </a>
     <a href="<?php echo base_url() ?>auth">|  User list</a>    
</div>
</div>
<br/><br/>
 <a href="<?php echo base_url() ?>musics/insert" class="btn btn-dark ">New Music</a>
 <br/><br/>
<?php if($musics == NULL || empty($musics)): ?>
    <p>Nincs rögzítve egyetlen alkalmazott sem!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Performer</th>
                <th>Title</th>
                <th>Time</th>
				
                <th>Operations</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($musics as &$mus): ?>
            <tr>
                <td><?=$mus->id?></td>
                <td><?=$mus->performer?></td>
                <td><?=$mus->title?></td>
                <td><?=$mus->time?></td>
				
                <td>
                    <?php echo anchor(base_url('musics/edit/'.$mus->id),'Edit');?>
                    <?php echo anchor(base_url('musics/delete/'.$mus->id),'Delete');?>
                    <?php echo anchor(base_url('musics/cover/'.$mus->id),'Profil');?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>


</div>

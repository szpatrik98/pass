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
	 <a href="<?php echo base_url() ?>musics/index">|  Musics List</a>  
</div>
</div>
<br/><br/>
 <a href="<?php echo base_url() ?>films/insert" class="btn btn-dark ">New Film</a>
 <br/><br/>

<?php if($films == NULL || empty($films)): ?>
    <p>Nincs rögzítve egyetlen film sem!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Address</th>
                <th>Type</th>
                <th>Time</th>
				
                <th>Operations</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($films as &$film): ?>
            <tr>
                <td><?=$film->id?></td>
                <td><?=$film->address?></td>
                <td><?=$film->type?></td>
                <td><?=$film->time?></td>
				
                <td>
                    <?php echo anchor(base_url('films/edit/'.$film->id),'Edit');?>
                    <?php echo anchor(base_url('films/delete/'.$film->id),'Delete');?>
                   
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>


</div>

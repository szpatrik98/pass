
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

	<div>

		<div class="p-3 mb-2 bg-secondary text-white text-center">
    
			<h1><?php echo lang('index_heading');?></h1></br>
			<p><?php echo lang('index_subheading');?></p>
  
			  <a href="<?php echo base_url() ?>auth/logout" class="btn btn-danger ">Logout  </a>
			  <a href="<?php echo base_url() ?>musics/index" class="btn btn-danger ">Musics List</a>     
			  <a href="<?php echo base_url() ?>films/index"class="btn btn-danger ">Films List</a> </br></br>
			  <div id="infoMessage"><?php echo $message;?></div></br>
		</div>   

		<div>
			  </br></br>
			  <p> <a href="<?php echo base_url() ?>auth/create_user" class="btn btn-dark ">Create User </a>
			  <a href="<?php echo base_url() ?>auth/create_group" class="btn btn-dark ">Create Group  </a></p></br></br>
				<table  cellpadding=0 cellspacing=10>
						<tr>
								<th><?php echo lang('index_fname_th');?></th>
								<th><?php echo lang('index_lname_th');?></th>
								<th><?php echo lang('index_email_th');?></th>
								<th><?php echo lang('index_groups_th');?></th>
								<th><?php echo lang('index_status_th');?></th>
								<th><?php echo lang('index_action_th');?></th>
						</tr>
						<?php foreach ($users as $user):?>
								<tr>
							<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
							<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
										<td>
												<?php foreach ($user->groups as $group):?>
														<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
								<?php endforeach?>
										</td>
										<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
										<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
								</tr>
						<?php endforeach;?>
				</table>
		</div>
	 </div>

<h2>Users</h2>

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<script type="text/javascript">

		$(document).ready(function() {
			$(".qsobox").fancybox({
				'width'				: '75%',
				'height'			: '50%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});


		});

	</script>

<div id="container">

<div class="row show-grid">
	  <div class="span13">

<?php if($this->session->flashdata('notice')) { ?>
	<div id="message" >
    	<?php echo $this->session->flashdata('notice'); ?>
	</div>
<?php } ?>

	<table class="users" width="100%">
		<tr class="user_title titles">
			<td>User</td>
			<td>E-mail</td>
			<td>Type</td>
			<td>Options</td>
		</tr>

		<?php

		$i = 0;
		foreach ($results->result() as $row) { ?>
		<?php  echo '<tr class="tr'.($i & 1).'">'; ?>
			<td><a href="<?php echo site_url('user/edit')."/".$row->user_id; ?>"><?php echo $row->user_name; ?></a></td>
			<td><?php echo $row->user_email; ?></td>
			<td><?php $l = $this->config->item('auth_level'); echo $l[$row->user_type]; ?></td>
			<td><a href="<?php echo site_url('user/edit')."/".$row->user_id; ?>">Edit</a> <a href="<?php echo site_url('user/delete')."/".$row->user_id; ?>">Delete</a></td>
		</tr>
		<?php $i++; } ?>
	</table>
	  </div>
	  <div class="span2 offset1">
	  <a class="btn primary" href="<?php echo site_url('user/add'); ?>">Add user</a>
	  </div>
	</div>

</div>

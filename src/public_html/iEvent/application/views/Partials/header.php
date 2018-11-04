<div class="navbar-wrapper sticky-top bg-darker">
    <nav class="navbar navbar-expand-lg" role="navigation">
      <a class="navbar-brand text-white" href="<?php echo site_url(); ?>">iEvent</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><img src="<?php echo site_url(); ?>/images/ToolbarIcons/toggle.png" Style="height:30px; width:30px; padding:0px; margin:0px;"></span>
  </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class='nav-link' href="<?php echo site_url(); ?>">Home</a></li>
            <?php
            if ($this->session->has_userdata("FirstName"))
            { 
			//Only show up if user is logged in
			echo"<li class='nav-item active'><a class='nav-link' href='#'>Event Manager</a></li>
            	<li class='nav-item active'><a class='nav-link' href='#'>Stuff</a></li>";
			}?>
        </ul>
        <a class="navbar-brand float-left" Style="margin:0px;" href="<?php echo site_url("Profile");?>">
      	<p Style="margin:0px;"><i class="fa fa-user" aria-hidden="true"><img src="<?php echo site_url(); ?>/images/ToolbarIcons/login.png" aria-hidden="true" Style="width:30px; height:30px; padding:0px; margin:0px;" /></i></p>
      </a>
      	<?php
            if ($this->session->has_userdata("FirstName"))
            { 
			//Only show up if user is logged in
			//echo"<li class='nav-item active'><a class='nav-link' href='#'>Event Manager</a></li>
            	//<li class='nav-item active'><a class='nav-link' href='#'>Stuff</a></li>";
			echo"<a class='navbar-brand float-left' Style='margin:0px;' href=".site_url("Authentication/logout").">
      				<p Style='margin:0px;'><i class='fa fa-user' aria-hidden='true'><img src='".site_url()."/images/ToolbarIcons/Logout.png' aria-hidden='true' Style='width:30px; height:30px; padding:0px; margin:0px;' /></i></p>
      			 </a>";
			}
		?>
      </div>
    </nav>
</div>

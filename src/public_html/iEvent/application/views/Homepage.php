<div class="jumbotron bg-gray mx-5 col-xs-11">
  <h1 class="display-4 text-yellow"><img src="../../images/logo.png" Style="width:175px; height:175px;" /> iEvent</h1>
  <p class="lead text-yellow">The simple solution to planning and attending events.</p>
  <hr class="my-4">
  <p></p>
  <a class="btn btn-lg bg-green hover-green text-white" href="#" role="button">Learn more</a>
</div>


<div class="row mx-5">
  <div class="col-xs-12 col-md-6 col-lg-4">
    <div class="card bg-gray text-orange mx-auto" >
      <div class="card-body">
        <h5 class="card-title">Events</h5>
        <p class="card-text">Take a look at all of the currently planned events!</p>
        <a href="<?php echo site_url("Events");?>" class="btn bg-orange hover-orange text-white">Let's Go!</a>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-md-6 col-lg-4">
    <div class="card bg-gray text-green mx-auto" >
      <div class="card-body">
        <h5 class="card-title">Users</h5>
        <p class="card-text">Take a look at all of people active in the community!</p>
        <a href="<?php echo site_url("Profile");?>" class="btn bg-green hover-green text-white">Let's Go!</a>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-md-6 col-lg-4">
    <div class="card bg-gray text-yellow mx-auto">
      <div class="card-body">
        <h5 class="card-title">Register</h5>
        <p class="card-text">Would you like to register an account today?</p>
        <a href="<?php echo site_url("Authentication/Register");?>" class="btn bg-yellow hover-yellow text-black">Heck Yeah!</a>
      </div>
    </div>
    </div>
  </div>
</div>
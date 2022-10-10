<?php

$PageTitle="Menu";


include_once('header.php');
?>

<div id="menu" class="container content-section">
  <div class="row">
    <div class="col"> 
      <h1>Menu</h1>
      <p>Please choose one of the below options to see the relevant items.</p>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="buttons">
        <button id="starters" type="button" class="btn btn-primary">Starters</button>
        <button id="mains" type="button" class="btn btn-primary">Mains</button>
        <button id="desserts" type="button" class="btn btn-primary">Desserts</button>
        <button id="all" type="button" class="btn btn-primary">All</button>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div id="menu-display">
        
      </div>
    </div>
  </div>
</div>

<?php
include_once('footer.php');
?>
<?php

$PageTitle="Contact";


include_once('header.php');
?>


<div id="contact" class="container content-section">
  <div class="row">
    <div class="col"> 
      <h1>Contact us</h1>
      <p>Use the below form to sumbit a complaint</p>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col">
      <div class="form">
          <form name="contactForm" id="contactForm" action="" method="post">
            <div class="mb-3"> 
              <label for="emailAddr" class="form-label">Email address</label>
              <input name="emailAddr" type="email" class="form-control" id="emailAddr" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input name="name" type="text" class="form-control" id="name" value="" required>
            </div>
            <div class="mb-3">
              <label for="complaint" class="form-label">Complaint</label>
              <textarea name="complaint" class="form-control" id="complaint" required></textarea>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
          </form>
      </div>
    </div>
  </div>   

  <div id="success-message" class="row hidden">
    <div class="col">
      <p>You have successfully submitted the form!</p>
    </div>
  </div>
  
  <div class="row">
    <div class="col">
      <div id="form-values">
        <div id="emailAddr-visual"></div>
        <div id="name-visual"></div>
        <div id="complaint-visual"></div>
      </div>
    </div>
  </div>
</div>

<?php
include_once('footer.php');
?>
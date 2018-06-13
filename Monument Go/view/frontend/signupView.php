<?php $title = 'Contacts'; ?>

<?php ob_start(); ?>


<link rel="stylesheet" type="text/css" href="public/css/signupStyle.css" >

<form id="regForm" action="">

<h1>Register:</h1>

<!-- One "tab" for each step in the form: -->
<div class="tab">Name:
  <p><input placeholder="First name..." oninput="this.className = ''"></p>
  <p><input placeholder="Last name..." oninput="this.className = ''"></p>
</div>

<div class="tab">Contact Info:
  <p><input placeholder="E-mail..." oninput="this.className = ''"></p>
  <p><input placeholder="Phone..." oninput="this.className = ''"></p>
</div>

<div class="tab">Address Info:
  <p><input placeholder="Street Number..." oninput="this.className = ''"></p>
  <p><input placeholder="Street Name..." oninput="this.className = ''"></p>
  <p><input placeholder="Town..." oninput="this.className = ''"></p>
  <p><input placeholder="Country..." oninput="this.className = ''"></p>
</div>

<div class="tab">Login Info:
  <p><input placeholder="Username..." oninput="this.className = ''"></p>
  <p><input placeholder="Password..." oninput="this.className = ''"></p>
</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</form>

<script src="public/js/signupScript.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/../template.php'); ?>
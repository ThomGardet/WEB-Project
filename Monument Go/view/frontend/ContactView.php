<?php $title = 'Contacts'; ?>

<?php ob_start(); ?>


<link rel="stylesheet" type="text/css" href="public/css/contactsStyle.css" >

<?php if (isset($user)) { echo '<style> .container { width: 80%; } </style>'; } else { echo '<style> .container { width: 100%; } </style>'; } ?>

<div class="container">
  <form action="action_page.php">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="<?php if (isset($user)) { echo $user->firstName(); } else { echo 'your name..'; } ?>">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="<?php if (isset($user)) { echo $user->lastName(); } else { echo 'your last name..'; } ?>">

    <label for="country">Country</label>
    <select id="country" name="country" value="germany">
      <option value="france">France</option>
      <option value="germany">Germany</option>
      <option value="england">England</option>
      <option value="italy">Italy</option>
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <?php if (isset($user)) { echo '<script> document.getElementById("country").value = "' . strtolower($user->country()) . '";</script>'; } ?>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/../template.php'); ?>
<!DOCTYPE html>

<html>

<head>

  <title>Change Password</title>

</head>

<body>

  <div class="container">

    <h2>Change Password</h2>

    <form action="changepass.php" method="POST">

      <label for="current_password">Current Password:</label>

      <input type="password"

       id="current_password"

       name="current_password" required>

      <span class="error"><?php echo $currentPasswordErr ?? ''; ?></span><br  />

     

      <label for="new_password">New Password:</label>

      <input type="password"

       id="new_password"

        name="new_password" required>

      <span class="error"><?php echo $newPasswordErr ?? ''; ?></span><br  />

     

      <label for="retype_password">Retype Password:</label>

      <input type="password"

       id="retype_password"

        name="retype_password" required>

      <span class="error"><?php echo $retypePasswordErr ?? ''; ?></span><br  />

     

      <input type="submit" value="Submit">

    </form>

  </div>

</body>

</html>
<!DOCTYPE html>

<html>

<head>

  <title>Login Page</title>

</head>

<body>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validation rules

    $usernameRegex = '/^[a-zA-Z0-9._-]{2,}$/';

    $passwordRegex = '/^.*[@#$%].*$/';




    $username = $_POST['username'];

    $password = $_POST['password'];

    $usernameErr = $passwordErr = '';




    // Validate username

    if (!preg_match($usernameRegex, $username)) {

        $usernameErr = 'Invalid username';

    }




    // Validate password

    if (strlen($password) < 8 || !preg_match($passwordRegex, $password)) {

        $passwordErr = 'Invalid password';

    }




    // If there are no errors, you can proceed with the login logic

    if (empty($usernameErr) && empty($passwordErr)) {

        // Handle login logic here

        // ...

    }

}

?>

  <div class="container">

    <h2>Login</h2>

    <form action="login.php" method="POST">

      <label for="username">Username:</label>

      <input type="text" id="username" name="username" required>

      <span class="error"><?php echo $usernameErr ?? ''; ?></span><br  />

     

      <label for="password">Password:</label>

      <input type="password" id="password" name="password" required>

      <span class="error"><?php echo $passwordErr ?? ''; ?></span><br  />




      <label for="remember">Remember me</label>

      <input type="checkbox" id="remember" name="remember"> <br  />

     

      <input type="submit" value="Submit">

    </form>

  </div>

</body>

</html>
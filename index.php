<?php
// Start session so we can show messages if needed
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Group 16 ERP System</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="wrapper">
    <header>
      <h1>Group 16 ERP System</h1>
    </header>

    <!-- TEAM SECTION -->
    <section class="team-row">
      <figure class="member">
        <img class="photo" src="images\mikalah.jpg" alt="Mikalah Wiles" />
        <figcaption class="name">Mikalah Wiles</figcaption>
      </figure>

      <figure class="member">
        <img class="photo" src="images\nikolina.jpg" alt="Nikolina Dimitrijevic" />
        <figcaption class="name">Nikolina Dimitrijevic</figcaption>
      </figure>

      <figure class="member">
        <img class="photo" src="images\cathy.jpg" alt="Cathy Kuo" />
        <figcaption class="name">Cathy Kuo</figcaption>
      </figure>

      <figure class="member">
        <img class="photo" src="images\hassan.jpg" alt="Hassan Berbich" />
        <figcaption class="name">Hassan Berbich</figcaption>
      </figure>

      <figure class="member">
        <img class="photo" src="images\ayberk.jpg" alt="Ayberk Zeytinoglu" />
        <figcaption class="name">Ayberk Zeytinoglu</figcaption>
      </figure>
    </section>

    <!-- LOGIN SECTION -->
    <section class="login-wrap">
      <div class="login-card">
        <?php if (isset($_GET['error'])): ?>
          <p class="error-msg"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST" autocomplete="off">
          <div class="form-row">
            <label for="username">Username:</label>
            <input id="username" name="username" type="text" required />
          </div>
          <div class="form-row">
            <label for="password">Password:</label>
            <input id="password" name="password" type="password" required />
          </div>
          <button class="btn" type="submit">Login</button>
        </form>
      </div>
    </section>
  </div>
</body>
</html>
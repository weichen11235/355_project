<!doctype html>
<html lang="en">
  <head>
    <?php include '../inc/head.php'; ?>
    <title>Sign In</title>
  </head>
  <body>
    <?php include '../inc/nav.php'; ?>

    <!-- main body -->
    <main class="d-flex min-vh-100 bg-dark align-items-center justify-content-center flex-column">
      <h1 class="text-white mb-3">Sign in</h1>
      <form method="POST" action="" class="text-center">
        <input type="text" name="username" id="username" class="form-control mb-2" placeholder="enter username" pattern="\w{5,}" required>

        <input type="password" name="password" id="password" class="form-control mb-2" placeholder="enter password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[A-Za-z0-9]{8,}" required>

        <input type="submit" value="submit" class="form-control mb-2">
        <a href="sign_up.php" class="text-white">sign up here</a>
      </form>
    </main>


    <?php include '../inc/bjs.php'; ?>
  </body>
</html>
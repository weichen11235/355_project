<!doctype html>
<html lang="en">
  <head>
    <?php include 'inc/head.php'; ?>
    <title>Home</title>
  </head>
  <body>
    <?php include 'inc/nav.php'; ?>

    <!-- main body -->
    <main class="d-flex min-vh-100 bg-dark align-items-center justify-content-center">
      <div>
        <h1 class="text-center display-4 text-white">Welcome</h1>
        <div class="d-flex flex-column flex-sm-row justify-content-center">
          <a href="logIn_signUp/sign_in.php" class="btn bg-white text-dark mr-sm-2 mb-2 mb-sm-0" role="button">login</a>
          <a href="logIn_signUp/sign_up.php" class="btn bg-white text-dark" role="button">sign up</a>
        </div>
      </div>
    </main>

    <?php include 'inc/bjs.php'; ?>
  </body>
</html>
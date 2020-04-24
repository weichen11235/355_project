<nav class="navbar navbar-expand bg-dark navbar-dark sticky-top">
      <!-- Links -->
      <ul class="navbar-nav"> 
        <li class="nav-item">
          <a class="nav-link" href="../logIn_signUp/sign_in.php">LogOut</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Course
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" target="_blank" href="https://www.cuny.edu/">CUNY Blackboard</a>
            <a class="dropdown-item" target="_blank" href="https://www.w3schools.com/">W3 School</a>
            <a class="dropdown-item" target="_blank" href="https://drive.google.com/open?id=1AsHhIFfQ3yNE_m2z4wswRfKh77K0UH9w">Google Drive</a>
            <a class="dropdown-item" target="_blank" href="https://tophat.com/">Top Hat</a>
            <a class="dropdown-item" target="_blank" href="https://www.zybooks.com/">Zybook</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" target="_blank" href="mailto: winer897@gmail.com">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(substr($_SERVER['PHP_SELF'], 26) === 'index.php'){echo 'active';} ?>" href="index.php">Assignment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(substr($_SERVER['PHP_SELF'], 26) === 'help.php'){echo 'active';} ?>" href="help.php">Help</a>
        </li>
      </ul>
    </nav>
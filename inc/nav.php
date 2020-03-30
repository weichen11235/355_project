<nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
      <!-- Links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link 
          <?php if($_SERVER['PHP_SELF'] == '/355Project/index.php'){echo 'active';} ?>" href="
          <?php
            if($_SERVER['PHP_SELF'] == '/355Project/index.php' || $_SERVER['PHP_SELF'] == '/355Project/about.php'){
              echo 'index.php';
            } 
            else{
              echo '../index.php';
            }
          ?>
          ">Home</a>
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
          <a class="nav-link 
          <?php if($_SERVER['PHP_SELF'] == '/355Project/about.php'){echo 'active';} ?>" href="
          <?php
            if($_SERVER['PHP_SELF'] == '/355Project/index.php' || $_SERVER['PHP_SELF'] == '/355Project/about.php'){
              echo 'about.php';
            } else{
              echo '../about.php';
            }
          ?>
          ">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" target="_blank" href="mailto: winer897@gmail.com">Contact</a>
        </li>
      </ul>
    </nav>
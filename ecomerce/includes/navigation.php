<?php
  $psql = "SELECT * FROM `categories` WHERE perent = 0";
    $pquery = $db -> query($psql);
?>
<nav class="navbar  navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Shaunta's Boutique</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <?php while ($perent = mysqli_fetch_assoc($pquery)): ?>
        <?php 
          $perent_id = $perent['id'];
          $chsql = "SELECT * FROM `categories` WHERE perent ='$perent_id'"; 
          $chquery = $db -> query($chsql);
        ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo $perent['category'] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php while ($child = mysqli_fetch_assoc($chquery)): ?>
          <a class="dropdown-item" href="#"><?php echo $child['category'] ?></a>
          <?php endwhile; ?>
        </div>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
</nav>
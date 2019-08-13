<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Quikr Awards Manager</a>
    </div>
    <ul class="nav navbar-nav">
    <li><a class="nav-link" href="http://192.168.64.2/project/patController.php">Prpose Award</a></li>
    <?php
    if($_SESSION['post'] == "manager")
    echo "<li><a class=\"nav-link\" href=\"http://192.168.64.2/project/approveController.php\">Approve Award</a></li>";
    if($_SESSION['post'] == "HR")   
    echo "<li><a class=\"nav-link\" href=\"http://192.168.64.2/project/hrController.php\">HR View</a></li>";
    ?>
    </ul>
  </div>
  <a href="view/logout.php"  ><button type="submit" class="btn btn-danger">logout</button></a>
  <a href="Model/download.php"  ><button type="submit" class="btn btn-success">download certificate</button></a>
</nav>
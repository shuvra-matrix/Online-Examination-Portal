<nav class="navbar navbar-expand-lg navbar-light bgg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><h4>Exam Portal</h4> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php  if(isset($_SESSION['id'])){    ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./include/logout.php?logout=true">Log Out</a>
                </li>
                <?php  } ?>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bgg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./admin_index.php"><h4>Exam Portal</h4></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php 
            
            if(isset($_SESSION)){ ?>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Students
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./student.php?action=add_student">Add Student</a></li>
                        <li><a class="dropdown-item" href="./student.php?action=view_student">View Student</a></li>
                        <li class="nav-item">
                            <a class="dropdown-item" aria-current="page" href="./student.php?action=view_score">Student Score</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Questions
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./question.php?action=add_question">Add Questions</a></li>
                        <li><a class="dropdown-item" href="./question.php?action=view_question">View Questions</a></li>
                        <li><a class="dropdown-item" href="./topic.php?action='#'">Topic Section</a></li>
                    </ul>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./include/logout.php?action=logout">Log Out</a>
                </li>
            </ul>
            <?php } ?>
        </div>
    </div>
</nav>
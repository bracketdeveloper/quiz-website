<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=home">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../">Main Website</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=addSubject">Add Subject </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=subjectList">Subjects List</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=addQuestion">Add Question </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=questionList">Questions List</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=usersList">Users List</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=quizzesList">Quizzes List</a>
            </li>
        </ul>
    </div>

    <div class="pull-right" style="margin-right: 50px">
        <ul class="navbar-nav mr-auto pull-right">
            <li class="nav-item">
                <a class="nav-link btn btn-danger text-white" href="logout.php"
                   onclick="return confirm('Do you want to logout?')">Logout</a>
            </li>
        </ul>
    </div>

</nav>
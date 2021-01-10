<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home </a>
            </li>
            <?php
            if (!((isset($_SESSION['username'])))) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/">Admin</a>
                </li>
                <?php
            } else {
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="history.php">Quiz History </a>
                </li>

                <?php
            }
            ?>

        </ul>
    </div>
    <?php
    if (((isset($_SESSION['username'])))) {
        ?>
        <div class="pull-right" style="margin-right: 50px">
            <ul class="navbar-nav mr-auto pull-right">
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" href="logout.php"
                       onclick="return confirm('Do you want to logout?')">Logout</a>
                </li>
            </ul>
        </div>
        <?php
    }
    ?>
</nav>
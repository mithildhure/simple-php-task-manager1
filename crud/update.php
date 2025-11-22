<?php 

SESSION_START();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $user_id = $_SESSION["u_id"];
    $task_id = $_GET["id"];
    $title = $_POST["title"];
    $desc = $_POST["desc"];
    $deadline = $_POST["deadline"];


    $sql = $conn->prepare("update tasks set task_title = ?, task_desc = ?, task_deadline = ? where t_id = ? and user_id = ?");
    $sql->bind_param("sssii",$title,$desc,$deadline,$task_id,$user_id);

    if ($sql->execute()) {
        echo "<script>alert('Task Updated')</script>";
    }else{
        echo "<script>alert('Failed to update task')</script>";
    }
}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Update Task</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
             <nav
                class="navbar navbar-expand-sm navbar-light bg-dark p-4"
             >
                <div class="container">
                    <a class="navbar-brand text-primary" href="#">Update Task</a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-primary" href="../home.php" aria-current="page"
                                    >Home
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-primary" href="#">Link</a>
                            </li>
                        </ul>
                    </div>
                </div>
             </nav>
             
        </header>
        <main>

        <h2 class="text-primary text-center p-2 my-3 ">Update Task</h2>

        <div
            class="container text-center p-3 my-4 col-5 bg-dark rounded"
        >
            <form method="post">

            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="title"
                    placeholder=""
                    required
                />
                <label for="title">Title</label>
            </div>
            
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    name="desc"
                    placeholder=""
                    required
                />
                <label for="desc">Description</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="date"
                    class="form-control"
                    name="deadline"
                    placeholder=""
                    required
                />
                <label for="deadline">Deadline</label>
            </div>

            <button
                type="submit"
                class="btn btn-success"
            >
                Update
            </button>

            </form>
        </div>
        

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

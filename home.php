<?php 

SESSION_START();
include 'db.php';

if (!isset($_SESSION["u_id"])) {
    header("Location:login.php");
    exit();
}

$user_id = $_SESSION["u_id"];

$stmt = $conn->prepare("select t_id, task_title, task_desc, task_deadline from tasks where user_id = ?");
        
$stmt->bind_param("i",$user_id);
$stmt->execute();
$result = $stmt->get_result();

?>


<!doctype html>
<html lang="en">
    <head>
        <title>Home</title>
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
                    <a class="navbar-brand text-primary" href="#">Task Manager</a>
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
                                <a class="nav-link active text-primary" href="#" aria-current="page"
                                    >Home
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-primary" href="#">Link</a>
                            </li>
                        </ul>
                        <a
                            name=""
                            id=""
                            class="btn btn-danger text-dark"
                            href="logout.php"
                            role="button"
                            >Logout</a
                        >
                        
                    </div>
                </div>
             </nav>
             
        </header>
        <main>

        <div
            class="container"
        >
            <h2 class="p-2 my-3 text-dark text-center">Welcome <?php echo $_SESSION["username"] ?></h2>
        </div>
        

        <div
            class="container text-right my-3 d-flex flex-row-reverse"
        >
            <!-- Modal trigger button -->
            <button
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modalId"
            >
                Add Task
            </button>
            
            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <form action="./crud/insert.php" method="post">
            <div
                class="modal fade"
                id="modalId"
                tabindex="-1"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                role="dialog"
                aria-labelledby="modalTitleId"
                aria-hidden="true"
            >
                <div
                    class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                    role="document"
                >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                                Add Task
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                        

                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                required
                            />
                            <label for="title">Title</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control"
                                name="desc"
                                required
                            />
                            <label for="title">Description</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input
                                type="date"
                                class="form-control"
                                name="deadline"
                                required
                            />
                            <label for="title">Deadline</label>
                        </div>

                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Close
                            </button>
                            <button type="submit" name="add" class="btn btn-primary">Add</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            </form>
            
            <!-- Optional: Place to the bottom of scripts -->
            <script>
                const myModal = new bootstrap.Modal(
                    document.getElementById("modalId"),
                    options,
                );
            </script>
            
            
        </div>
        

        <div
            class="container"
        >
        
        <div
            class="table-responsive"
        >
            <table
                class="table table-light table-bordered"
            >
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Task ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr class="">
                        <td scope="row"><?php echo $row['t_id'] ?></td>
                        <td><?php echo $row['task_title'] ?></td>
                        <td><?php echo $row['task_desc'] ?></td>
                        <td><?php echo $row['task_deadline'] ?></td>
                        <td><a
                            name=""
                            id=""
                            class="btn btn-success"
                            href="./crud/update.php?id=<?php echo $row['t_id']; ?>"
                            role="button"
                            >Update</a
                        >
                        </td>
                        <td><a
                            name=""
                            id=""
                            class="btn btn-danger"
                            href="./crud/delete.php?id=<?php echo $row['t_id'];?>"
                            role="button"
                            >Delete</a
                        >
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        

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

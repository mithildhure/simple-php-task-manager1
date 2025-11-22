<?php 

SESSION_START();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    
    $name = $_POST["username"];
    $pass = $_POST["password"];

    $sql = $conn->prepare("select u_id, password from users where username = ?");
    $sql->bind_param("s",$name);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($id, $h_password);
    
    if ($sql->fetch() && password_verify($pass, $h_password)) {
        $_SESSION["username"] = $name;
        $_SESSION["u_id"] = $id;
        header("Location:home.php");
    }
    else {
        echo "<script>alert('Wrong Username or Password')</script>";
    }

}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
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
             <h2 class="p-3 bg-dark text-center text-primary">Login</h2>
        </header>
        <main>

        <div
            class="container text-center p-3 my-5 bg-dark rounded col-5"
        >
            <form  method="post">
            
            <div class="form-floating mb-3 my-4">
                <input
                    type="text"
                    class="form-control"
                    name="username"
                    placeholder=""
                />
                <label for="username">Username</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    placeholder=""
                />
                <label for="password">Password</label>
            </div>

            <button
                type="submit"
                class="btn btn-primary text-dark"
            >
                Submit
            </button>
            
        </form>

        </div>

        <div
            class="container"
        >
            <h4 class="text-center text-dark">New User? <a href="register.php">Register</a></h4>
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

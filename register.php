<?php 
include 'db.php';

if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);

    $sql = $conn->prepare("insert into users(username, password, email) values(?,?,?)");
    $sql->bind_param("sss",$username,$password,$email);

    if ($sql->execute()) {
        header("Location:login.php");
    } else{

    }

}

?>


<!doctype html>
<html lang="en">
    <head>
        <title>Register</title>
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
             <h1 class="bg-dark text-center text-primary p-4">Register</h1>
        </header>
        <main>

        <div
            class="container text-center my-5 p-4 col-5 bg-dark rounded"
        >
        
        <form method="post" onsubmit="return validateForm()">

        <div class="form-floating mb-3 my-3">
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
                type="email"
                class="form-control"
                name="email"
                placeholder=""
            />
            <label for="email">Email</label>
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
            <h4 class="text-center text-dark">Already a User? <a href="login.php">Login</a></h4>
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

        <script>
            function validateForm(){
                let user = document.querySelector("input[name='username']").value;
                let email = document.querySelector("input[name='email']").value;
                let password = document.querySelector("input[name='password']").value;

                if(user === "" || email === "" || password === ""){
                    alert("All fields are required!");
                    return false;
                }

                return true;
            }
        </script>
    </body>
</html>

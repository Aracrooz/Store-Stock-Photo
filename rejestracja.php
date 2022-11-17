<html lang="pl">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
    <script>
        function validateForm() {
            var a = document.forms["myForm"]["email"].value;
            var b = document.forms["myForm"]["fname"].value;
            var c = document.forms["myForm"]["lname"].value;
            var d = document.forms["myForm"]["passwd"].value;
            if (a == "" || a == null || b == "" || b == null || c == "" || c == null || d == "" || d == null) {
                alert("Wypełnij formularz");
                return false;
            }
        }
    </script>
        <?php
            require('conn.php');
            $email = NULL;
            $fname = NULL;
            $lname = NULL;
            $passwd = NULL;
            if(isset($_POST['register'])){
                $email = $_POST['email'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $passwd = $_POST['passwd'];
                try {
                    $query = "INSERT INTO uzytkownicy SET email=:email, imie=:fname, nazwisko=:lname, haslo=:passwd";
                    $statement = $db_conn->prepare($query);
                    $data = [
                        ':email'=>$email, 
                        ':fname'=>$fname, 
                        ':lname'=>$lname, 
                        ':passwd'=>$passwd, 
                    ];
                    $query_execute = $statement->execute($data);
                    if($query_execute){
                        echo '<script>alert("Rejestracja pomyślna")</script>';
                        header("Refresh:0");
                    } 
                } catch (PDOException $e) {
                    echo '<script>alert("Konto o podanym adresie email już istnieje")</script>';
                }
            }
        ?>
        <div class="row justify-content-center">
            <form name="myForm" onsubmit="return validateForm()" method="POST" class="col-2">
                <div class="row">
                    <label for="inputEmail" class="form-label">E-mail</label>
                    <input name="email" type="email" value="<?=$email;?>" class="form-control" id="inputEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Podaj poprawny email">
                </div>
                <div class="row">
                    <label for="inputImie" class="form-label">Imie</label>
                    <input name="fname" type="fname" value="<?=$fname;?>" class="form-control" id="inputImie">
                </div>
                <div class="row">
                    <label for="inputNazwisko" class="form-label">Nazwisko</label>
                    <input name="lname" type="lname" value="<?=$lname;?>" class="form-control" id="inputNazwisko">
                </div>
                <div class="row">
                    <label for="inputPassword" class="form-label">Hasło</label>
                    <input name="passwd" type="password" class="form-control" id="inputPassword" pattern=".{8,}" title="Hasło musi zawierać minimum 8 znaków">
                </div>
                <div class="row-4">
                    <br>
                    <button type="submit" class="btn btn-primary" name="register">Rejestruj</button>
                </div>
                <div class="row-6">
                    <a href="logowanie.php"><br>Zaloguj się</a>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
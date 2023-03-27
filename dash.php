<?php
include('connexiondb.php');
ini_set('display_errors', 'on');
ob_start();
// Initialiser la session
session_start();
include('session.php');
include('inscription.php');
include('deleteuser.php');
//vérifier si l'utilisateur n'est pas connecté
if (!isset($_SESSION["id_user"])) {
    header("Location:inscr_conn.php");
    exit();
}
$sqluser = "SELECT * FROM `utilisateur`";
$resultuser = mysqli_query($conn, $sqluser);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>WeLoveFood</title>
    <meta charset="utf-8">
    <link href="css/inscr_conn.css" rel="stylesheet">
    <link href="css/style_conn.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.7.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="script/form.js"></script>
</head>

<body>
    <div class="table-responsive text-nowrap">
        <!--Table-->
        <table class="table table-striped">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Parametres utilisateurs</h2>
                </div>
                <div class="col-sm-6" style="text-align:end;"> <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Publier</button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="logo">
                                        <img src="./Img/logo/logo.jpg" alt="">
                                    </div>
                                    <div class="text-center mt-4 name">
                                        Ajout utilisateur
                                    </div>
                                </div>
                                <div class="wrapper">
                                    <form class="p-3 mt-3" action="" method="POST" enctype="multipart/form-data">
                                        <div id="error">
                                        </div>
                                        <div id="errorMessage"> <span>&#9888;</span>Erreur: des champs vide!</div>
                                        <!-- Nom -->
                                        <div class="form-field d-flex align-items-center">
                                            <span class="far fa-user"></span>
                                            <input type="text" name="nom" id="Name" placeholder="nom" autocomplete="off" />
                                        </div>
                                        <span class="text-success float-right mr-2" id="nom_status"></span>
                                        <div class="error" id="nameError"></div>
                                        <!-- Prenom -->
                                        <div class="form-field d-flex align-items-center">
                                            <span class="fas fa-key"></span>
                                            <input type="text" name="prenom" id="prenom" placeholder="prenom" autocomplete="off" />
                                        </div>
                                        <span class="text-success float-right mr-2" id="prenom_status"></span>
                                        <div class="error" id="lastNameError"></div>
                                        <!-- Email -->
                                        <div class="form-field d-flex align-items-center">
                                            <span class="far fa-user"></span>
                                            <input type="text" name="email" id="userName" placeholder="email" autocomplete="off" />
                                        </div>
                                        <div class="error" id="emailError"></div>
                                        <div class="error" id="emailMissing"></div>
                                        <span class="text-success float-right mr-2" id="email_status"></span>
                                        <p class="error"><?php if (isset($errors['u'])) echo $errors['u']; ?></p>
                                        <!-- password -->
                                        <div class="form-field d-flex align-items-center">
                                            <span class="fas fa-key"></span>
                                            <input type="password" name="password" id="pwd" placeholder="mot de passe" autocomplete="off" />
                                        </div>
                                        <div class="error" id="passwordMissing"></div>
                                        <div id="pswd_info">
                                            <ul>
                                                <li id="letter" class="invalid">Au moins <strong>une lettre</strong></li>
                                                <li id="capital" class="invalid">Au moins <strong>une majuscule</strong></li>
                                                <li id="number" class="invalid">Au moins <strong>un nombre</strong></li>
                                                <li id="length" class="invalid">Au moins <strong>8 caractères</strong></li>
                                            </ul>
                                        </div>
                                        <!-- Image -->
                                        <div class="form-field d-flex align-items-center">
                                            <span class="fas fa-key"></span>
                                            <input type="file" name="image" id="image" />
                                        </div>
                                        <!-- Bouton -->
                                        <button class="btn mt-3" name="inscription" id="inscription">Inscription</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Table head-->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Profile</th>
                    <th colspan='2' style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>
                <?php
                if (mysqli_num_rows($resultuser) > 0) {
                    while ($row = mysqli_fetch_assoc($resultuser)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $row['id_user']; ?></th>
                            <td><?php echo $row['nom_user']; ?></td>
                            <td><?php echo $row['prenom_user']; ?></td>
                            <td><?php echo $row['email_user']; ?></td>
                            <td><img class="test" style="height: 25px; width: 35px;" src="<?= $row['img_user'] ?>" /></td>
                            <td style="text-align: center;">

                                <div class="col-sm-6" style="text-align:end;"> <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModale">Modifier</button>
                                    <!-- Modal -->
                <div class="col-sm-6" style="text-align:end;"> <!-- Trigger the modal with a button -->
                    <!-- Modal -->
                    <div class="modal fade" id="myModale" role="dialog">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="logo">
                                        <img src="./Img/logo/logo.jpg" alt="">
                                    </div>
                                    <div class="text-center mt-4 name">
                                        Modif utilisateur
                                    </div>
                                </div>
                                <div class="wrapper">
                                    <form class="p-3 mt-3" action="" method="POST" enctype="multipart/form-data">
                                        <div id="error">
                                        </div>
                                        <div id="errorMessage"> <span>&#9888;</span>Erreur: des champs vide!</div>
                                        <!-- Nom -->
                                        <div class="form-field d-flex align-items-center">
                                            <span class="far fa-user"></span>
                                            <input type="text" name="nom" id="Name" placeholder="nom" autocomplete="off" />
                                        </div>
                                        <span class="text-success float-right mr-2" id="nom_status"></span>
                                        <div class="error" id="nameError"></div>
                                        <!-- Prenom -->
                                        <div class="form-field d-flex align-items-center">
                                            <span class="fas fa-key"></span>
                                            <input type="text" name="prenom" id="prenom" placeholder="prenom" autocomplete="off" />
                                        </div>
                                        <span class="text-success float-right mr-2" id="prenom_status"></span>
                                        <div class="error" id="lastNameError"></div>
                                        <!-- Email -->
                                        <div class="form-field d-flex align-items-center">
                                            <span class="far fa-user"></span>
                                            <input type="text" name="email" id="userName" placeholder="email" autocomplete="off" />
                                        </div>
                                        <div class="error" id="emailError"></div>
                                        <div class="error" id="emailMissing"></div>
                                        <span class="text-success float-right mr-2" id="email_status"></span>
                                        <p class="error"><?php if (isset($errors['u'])) echo $errors['u']; ?></p>
                                        <!-- password -->
                                        <div class="form-field d-flex align-items-center">
                                            <span class="fas fa-key"></span>
                                            <input type="password" name="password" id="pwd" placeholder="mot de passe" autocomplete="off" />
                                        </div>
                                        <div class="error" id="passwordMissing"></div>
                                        <div id="pswd_info">
                                            <ul>
                                                <li id="letter" class="invalid">Au moins <strong>une lettre</strong></li>
                                                <li id="capital" class="invalid">Au moins <strong>une majuscule</strong></li>
                                                <li id="number" class="invalid">Au moins <strong>un nombre</strong></li>
                                                <li id="length" class="invalid">Au moins <strong>8 caractères</strong></li>
                                            </ul>
                                        </div>
                                        <!-- Image -->
                                        <div class="form-field d-flex align-items-center">
                                            <span class="fas fa-key"></span>
                                            <input type="file" name="image" id="image" />
                                        </div>
                                        <!-- Bouton -->
                                        <button class="btn mt-3" name="inscription" id="inscription">Enregistrer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                </div>
                            </td>
                            <td style="text-align: center;"><button type="button" class="btn btn-danger deleteuser">Supprimer</button></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <!--Table body-->


        </table>
    </div>
    </section>

    <script>
        $(document).ready(function () {

            $('.deleteuser').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>


</body>

</html>
<?php

ini_set('display_errors', 'on'); 
include('connexiondb.php');

if(isset($_POST['displaySend'])){
    $table='<table>
    <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Profile</th>
                    <th colspan="2" style="text-align: center">Actions</th>
                </tr>
            </thead>
    ';

$sqluser = "SELECT * FROM `utilisateur`";
$resultuser = mysqli_query($conn, $sqluser);

                if (mysqli_num_rows($resultuser) > 0) {
                    while ($row = mysqli_fetch_assoc($resultuser)) {
                        $id=$row['id_user'];
                        $nom=$row['nom_user'];
                        $prenom=$row['prenom_user'];
                        $email=$row['email_user'];
                        $mdp=$row['mdp_user'];
                        $profile=$row['img_user'];
                        $table.='
<tr>
<th scope="row">'.$id.'</th>
                            <td>'.$nom.'</td>
                            <td>'.$prenom.'</td>
                            <td>'.$email.'</td>
                            <td><img class="test" style="height: 25px; width: 35px;" src="'.$profile.'" /></td>
                            <td style="text-align: center;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModale">Modifier</button></td>
                            <td style="text-align: center;"><button type="button" class="btn btn-danger" onclick="DeletUser('.$id.')">Supprimer</button></td>
</tr>';
              
}
$table.='</table>';
echo $table;
}
}
?>
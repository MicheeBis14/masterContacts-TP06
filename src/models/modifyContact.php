<?php include_once "../../data/models/datas.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="assets/import/bootstrap-icons-1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <div class="block">

        <div class="block-items">

            <?php

            if (isset($_GET['id'])) {
                if (!empty($_GET['id'])) {
                    $db = Connexion("master_contacts");

                    $id = htmlspecialchars($_GET['id']);

                    $query = "SELECT * FROM contacts WHERE id = ?";
                    $stmnt = $db->prepare($query);
                    $stmnt->execute(array($id));

                    $datas = $stmnt->fetch();
                    // $datas = getContactById($id);

                    // $datas = $data->fetch();
                }
            ?>

                <form action="../controller/controllerModifyContact.php" method="POST" class="form">

                    <h1>Modification</h1>

                    <div class="item">

                        <input name="id" type="hidden" id="nameUse" class="nom" value="<?= $datas['id']; ?>">

                        <label for="nameUse">Nom</label><br>
                        <input name="nom" type="text" id="nameUse" class="nom" value="<?= $datas['nom']; ?>">
                    </div>

                    <div class="item">
                        <label for="prenom">Prenom</label><br>
                        <input name="prenom" type="text" id="prenom" class="prenom" value="<?= $datas['prenom']; ?>">
                    </div>

                    <div class="item">
                        <label for="tel">Télephone</label><br>
                        <input name="phone" type="text" id="tel" class="nom" value="<?= $datas['phone']; ?>">
                    </div>

                    <div class="item">
                        <label for="email">Email user</label><br>
                        <input name="email" type="email" id="email" class="nom" value="<?= $datas['email']; ?>">
                    </div>

                    <div class="item sub">
                        <button name="btnModify" type="submit" class="sub" id="btnAdd">Modifier </button>
                    </div>
                </form>

            <?php }; ?>

        </div>

        <!-- <div class="block-items left">
            <div class="tableau">
                <h1>Liste des contacts</h1>

                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Télephone</th>
                        <th>Email addres</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $rows = getContacts();

                        foreach ($rows as $contact) {

                        ?>
                            <tr>
                                <td> <?= $contact['id']; ?> </td>
                                <td> <?= $contact['nom']; ?> </td>
                                <td> <?= $contact['prenom']; ?> </td>
                                <td> <?= $contact['phone']; ?> </td>
                                <td> <?= $contact['email']; ?> </td>

                                <td class="action">

                                    <a id="modify" href="index.php"> Modifier </a>

                                    <a href="#"> Supprimer </a>
                                </td>

                            </tr>

                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div> -->
    </div>
</body>

</html>
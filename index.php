<?php require_once "data/models/datas.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/import/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
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
                    if ($stmnt->rowCount() > 0) {
                        $datas = $stmnt->fetch();
                    } else {
                        echo "<script> alert('Id nexiste pas dans la BD'), window.location.href='index.php'</script>";
                    }
                }
            ?>

                <form action="src/controller/controllerModifyContact.php" method="POST" class="form">

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
            <?php } else { ?>

                <form action="src/controller/controllerAddContact.php" method="POST" class="form">
                    <h1>Enregistrement</h1>

                    <div class="item">
                        <label for="nameUse">Nom</label><br>
                        <input name="nom" type="text" id="nameUse" class="nom" placeholder="Your name">
                    </div>
                    <div class="item">
                        <label for="prenom">Prenom</label><br>
                        <input name="prenom" type="text" id="prenom" class="prenom" placeholder="Your firstname">
                    </div>
                    <div class="item">
                        <label for="tel">Télephone</label><br>
                        <input name="phone" type="text" id="tel" class="nom" placeholder="Your phone number">
                    </div>
                    <div class="item">
                        <label for="email">Email user</label><br>
                        <input name="email" type="email" id="email" class="nom" placeholder="Your name">
                    </div>
                    <div class="item sub">
                        <button name="btnAdd" type="submit" class="sub" id="btnAdd">Save </button>
                    </div>
                </form>
            <?php } ?>

        </div>

        <div class="block-items left">
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
                                    <a class="d-lock btn btn-primary 
                                     mx-auto" id="modify" href="index.php?id=<?= $contact['id'] ?>"> Modifier </a>
                                    <!-- <a href="src/controller/controllerDelete.php?id=<?= $contact['id'] ?>"> Supprimer </a> -->

                                    <!-- Button -->
                                    <button class="d-lock btn btn-danger 
                                     mx-auto" data-bs-toggle="modal" data-bs-target="#modal1">Supprimer
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" aria-labelledby="modal title">
                                                        Voulez-vous vraiment supprimer ?
                                                    </h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" arial-label="Close"></button>
                                                </div>
                                                <div class="modal-body" aria-describedby="content">
                                                    <a href="src/controller/controllerDelete.php?id=<?= $contact['id'] ?>"> Oui</a>
                                                    <a href="index.php"> Non</a>
                                                </div>
                                                <div class="modal-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/
            Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="
                sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
</body>

</html>
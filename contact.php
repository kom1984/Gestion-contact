<!-- header -->
<?php include 'partials/_header.php';

$postContactId = $_GET['ID'];
$contacts = getContactById($postContactId);

?>

<div class="container">
    <div class="col">
        <?php foreach ($contacts as $contact): ?>
            <div class="jumbotron mt-4">
                <h1 class="display-4">
                    <?= $contact['prenom'] ?>
                    <?= $contact['nom'] ?>
                </h1>
                <p class="lead">
                    <?= $contact['email'] ?>
                </p>
                <p class="lead">
                    <?= $contact['telephone'] ?>
                </p>
                <hr class="my-4">
                <a class="btn btn-warning btn-sm" href="contact-edit.php?ID=<?= $contact['id_contact'] ?>"
                    role="button">Modifier la fiche</a>
                <a class="btn btn-danger btn-sm" href="contact-delete.php?ID=<?= $contact['id_contact'] ?>" role="button">Supprimer le contact</a>
                <a class="btn btn-primary btn-sm" href="index.php" role="button">Retourner aux contacts</a>
            </div>
        </div>
    <?php endforeach ?>
</div>

<!-- footer -->
<?php include 'partials/_footer.php' ?>
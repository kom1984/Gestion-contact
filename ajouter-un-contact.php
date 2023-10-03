<!-- header -->
<?php include 'partials/_header.php';
$userid = 2;
#1. Récupération des informations
# Initialisation des variables à null
$prenom = $nom = $email = $telephone = $id_administrateur = null;

# $_POST ne peut pas être vide quand l'utilisateur a soumis les données de son formulaire.
if (!empty($_POST)) {

    #2. Je peux commencer ma validation
    $prenom = $_POST['prenom']; # Contient les données du champ #prenom
    $nom = $_POST['nom']; # Contient les données du champ #nom

    $email = $_POST['email']; # Contient les données du champ #email
    $telephone = $_POST['telephone']; # Contient les données du champ #telephone
    $id_administrateur = $userid; # Contient les données du champ #telephone

    #3. Vérification des informations saisies
    # Déclarer un tableau d'erreurs
    $errors = [];

    # Vérification du prenom
    if (empty($prenom)) {
        $errors['prenom'] = "N'oubliez pas votre prénom.";
    }

    if (empty($nom)) {
        $errors['nom'] = "N'oubliez pas votre nom.";
    }

    if (empty($email)) {
        $errors['email'] = "N'oubliez pas votre email.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Vérifier le format de votre e-mail.";
    }

    if (empty($telephone)) {
        $errors['telephone'] = "N'oubliez pas votre telephone numéro.";
    }



    #4. S'il n'y a aucune dans mon tableau,alors je peux procéder à l'insertion dans la BDD

    if (empty($errors)) {
    $idContact = insertContact($prenom, $nom, $email, $telephone, $id_administrateur);
    #if ($idContact) {
    # Alerte de confirmation
    #addFlash('success', 'Félicitation votre contact est ajouter.');
    # redirect("ajouter-un-contact.php");
    }
    #}


} // endif(empty($POST))

?>

<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Ajouter un Contact</h1>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm p-4">
                    <form id="contact" method="post" action="ajouter-un-contact.php">



                        <!-- Affichage d'une notification d'erreur -->
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger mt-4">
                                <u>Une erreur est survenue dans la validation de vos données :</u> <br>
                                <?php foreach ($errors as $error): ?>
                                    <?= $error ?> <br>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!--  Prénom -->
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text"
                                class="form-control <?= isset($errors['prenom']) ? 'is-invalid' : '' ?>" id=" prenom"
                                name="prenom" value="" placeholder="Saisissez votre prenom complet">
                            <div class="invalid-feedback">
                                <?= $errors['prenom'] ?? '' ?>
                            </div>
                        </div>
                        <!--  nom -->
                        <div class="mb-3">
                            <label for="nom" class="form-label">nom</label>
                            <input  type="text"
                                class="form-control <?= isset($errors['nom']) ? 'is-invalid' : '' ?>" id="nom"
                                name="nom" value="" placeholder="Saisissez votre nom complet">
                            <div class="invalid-feedback">
                                <?= $errors['nom'] ?? '' ?>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input  type="email"
                                class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email"
                                name="email" value="" placeholder="Saisissez votre email">
                            <div class="invalid-feedback">
                                <?= $errors['email'] ?? '' ?>
                            </div>
                        </div>

                        <!-- Telephone -->
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input  type="text"
                                class="form-control <?= isset($errors['telephone']) ? 'is-invalid' : '' ?> "
                                id="telephone" name="telephone" value="" placeholder="Saisissez votre telephone ">
                            <div class="invalid-feedback">
                                <?= $errors['telephone'] ?? '' ?>
                            </div>
                        </div>

                        <br>

                        <!-- Submit -->
                        <div class="d-grid gap-2">
                            <button class="btn btn-block btn-dark">
                                <i class="fas fa-plus-circle"></i>
                                Ajouter le Contact
                            </button>
                        </div>

                    </form>





                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php include 'partials/_footer.php' ?>
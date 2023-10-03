<!-- header -->
<?php die('STOP'); include 'partials/_header.php';

$userid = 2;
$contactId = $_GET['ID'];
$contactToEdit = getContactById($contactId);

#1. Récupération des informations
# Initialisation des variables à null
$prenom = $nom = $email = $telephone = $id_administrateur = null;

# $_POST ne peut pas être vide quand l'utilisateur a soumis les données de son formulaire.
if (!empty($_POST)) {

    #2. Je peux commencer ma validation
    $id_contact= $contactId;
    $prenom = $_POST['prenom']; # Contient les données du champ #prenom
    $nom = $_POST['nom']; # Contient les données du champ #nom

    $email = $_POST['email']; # Contient les données du champ #email
    $telephone = $_POST['telephone']; # Contient les données du champ #telephone
    $id_administrateur = $userid; # Contient les données du champ #telephone

   
    $idContact = updateContact($id_contact,$prenom, $nom, $email, $telephone, $id_administrateur);
        #if ($idContact) {
        # Alerte de confirmation
        #addFlash('success', 'Félicitation votre contact étais modifié.');
        # redirect("contact.php");
        #}


} // endif(empty($POST))

?>

<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Modifier un Contact</h1>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm p-4">
                    <form id="contactediter" method="post" action="contact-edit.php">



                       
                        <?php foreach ($contactToEdit as $contactedit): ?>
                            <!--  Prénom -->
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input required type="text"
                                    class="form-control" id=" prenom"
                                    name="prenom" value="<?= $contactedit['prenom'] ?>"
                                    placeholder="Saisissez votre prenom complet">
                                
                            </div>
                            <!--  nom -->
                            <div class="mb-3">
                                <label for="nom" class="form-label">nom</label>
                                <input required type="text"
                                    class="form-control" id="nom"
                                    name="nom" value="<?= $contactedit['nom'] ?>" placeholder="Saisissez votre nom complet">
                                
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input required type="email"
                                    class="form-control" id="email"
                                    name="email" value="<?= $contactedit['email'] ?>" placeholder="Saisissez votre email">
                                
                            </div>

                            <!-- Telephone -->
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Telephone</label>
                                <input required type="text"
                                    class="form-control  "
                                    id="telephone" name="telephone" value="<?= $contactedit['telephone'] ?>"
                                    placeholder="Saisissez votre telephone ">
                                
                            </div>

                            <br>
                        <?php endforeach ?>
                        <!-- Submit -->
                        <div class="d-grid gap-2">
                            <button class="btn btn-block btn-warning">

                                Changer
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
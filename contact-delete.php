<!-- header -->
<?php include 'partials/_header.php';
$userid = 2;
$contactId = $_GET['ID'];
$contactToEdit = getContactById($contactId);


# $_POST ne peut pas être vide quand l'utilisateur a soumis les données de son formulaire.
if ($_POST("deletebtn")) {

$id_contact = $contactId;
    $prenom = $_POST['prenom']; # Contient les données du champ #prenom
    $nom = $_POST['nom']; # Contient les données du champ #nom
    $email = $_POST['email']; # Contient les données du champ #email
    $telephone = $_POST['telephone']; # Contient les données du champ #telephone
    $id_administrateur = $userid;

        $idContact = deleteContact($id_contact,$prenom, $nom, $email, $telephone, $id_administrateur);
        #if ($idContact) {
        # Alerte de confirmation
        #addFlash('success', 'votre contact étais supprimé.');
        # redirect("index.php");
    #}
    }

#<?php echo trim($contactedit['id_contact']); 


?>

<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Supprimer un Contact</h1>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">

                <div class="col">
                <div class="card shadow-sm p-4">
                    <form id="contactsupprimer" method="post" action="contact-delete.php">
                                  
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
                                    class="form-control " id="nom"
                                    name="nom" value="<?= $contactedit['nom'] ?>" placeholder="Saisissez votre nom complet">
                                
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input required type="email"
                                    class="form-control " id="email"
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
                            <button class="btn btn-block btn-warning" name="deletebtn">

                                ok delete
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
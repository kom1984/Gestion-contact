<!-- header -->
<?php include 'partials/_header.php';

#Récupération de mes articles
$contacts = getContacts();
#var_dump($contacts);
?>

<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Mes Contacts</h1>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col">
                 <div id="divToPrint">
                    <div id="tablePrint">
                <div class="card shadow-sm">                
           
                    <table id="contactTable" class="table">

                        <thead>
                            <tr>
                                <th scope="col">Prénom</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <?php foreach ($contacts as $contact) { ?>
                            <tbody>
                                <tr>

                                    <td>
                                        <?= $contact['prenom'] ?>
                                    </td>
                                    <td>
                                        <?= $contact['nom'] ?>
                                    </td>
                                    <td>
                                        <?= $contact['email'] ?>
                                    </td>
                                    <td>
                                        <?= $contact['telephone'] ?>
                                    </td>

                                    <td>
                                        <a class="btn btn-primary" href="contact.php?ID=<?= $contact['id_contact'] ?>">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning" href="contact-edit.php?ID=<?= $contact['id_contact'] ?>">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a class="btn btn-danger" href="contact-delete.php?ID=<?= $contact['id_contact'] ?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                   </div>
                   </div> 
                </div>
            </div>
        </div>
    </div>
</div>






    
  


<!-- footer -->
<?php include 'partials/_footer.php' ?>
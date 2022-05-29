<!DOCTYPE html>
<html>
    <head>
        <title>Admin Web Page</title>
        <link href="./css/styles.css" rel="stylesheet">
        <style>
            <?php include 'updateFormStyle.php'; ?>
        </style>
    </head>
    <body>
        <?php require_once('./addDropdownMenu.php'); ?>

        <h1>Administration Page</h1>

        <form action="updateDatabase.php" method="POST">
            <div class="update_form">
                <div class="first_row">
                    <label for="armoire_id"> N° de l'armoire </label>
                    <input name="armoire_id" id="armoire_id" placeholder="N° de l'armoire">

                    <label for="floor_id"> N° de l'étage </label>
                    <input name="floor_id" id="floor_id" placeholder="N° de l'étage">
                </div>

                <div class="second_row">
                    <label for="area_id"> N° de l'emplacement </label>
                    <input name="area_id" id="area_id" placeholder="N° de l'emplacement">

                    <label for="sensor_type"> Type de capteur </label>
                    <select name="sensor_type" id="sensor_type">
                        <option value="force"> Capteur de force </option>
                        <option value="distance"> Capteur de distance </option>
                    </select>
                </div>

                <div class="third_row">
                    <label for="componenet"> Composant </label>
                    <input name="component" id="component" placeholder="Composant">

                    <label for="restock_quantity"> Seuil </label>
                    <input name="restock_quantity" id="restock_quantity" placeholder="Seuil">
                </div>
                
                <div class="update">
                    <button>Mettre à jour la BDD</button>
                </div>
            </div>
        </form>

        <script src="scripts/autoFillForm.js"></script>
    </body>
</html>
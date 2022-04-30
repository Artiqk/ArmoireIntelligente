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
        <h1>Administration Page</h1>
        <form action="updateDatabase.php" method="POST">
            <div class="update_form">
                <div class="first_row">
                    <input name="armoire_id" id="armoire_id" placeholder="Numéro de l'armoire">
                    <input name="floor_id" id="floor_id" placeholder="Numéro de l'étagère">
                </div>
                <div class="second_row">
                    <input name="area_id" id="area_id" placeholder="Numéro de la zone">
                    <select name="sensor_type" id="sensor_type">
                        <option value="force"> Capteur de force </option>
                        <option value="distance"> Capteur de distance </option>
                    </select>
                </div>
                <div class="third_row">
                    <input name="component" id="component" placeholder="Composant">
                    <input name="restock_quantity" id="restock_quantity" placeholder="Quantité de restock">
                </div>
                <div class="update">
                    <button>Mettre à jour la BDD</button>
                </div>
            </div>
        </form>

        <script src="autoFillForm.js"></script>
    </body>
</html>
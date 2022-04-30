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
                    <select name="armoire_id" id="armoire_id"> <?php addMenu(10); ?> </select>
                    <select name="floor_id" id="floor_id"> <?php include addMenu(3); ?> </select>
                </div>

                <div class="second_row">
                    <select name="area_id" id="area_id"> <?php include addMenu(4); ?> </select>
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

        <script src="scripts/autoFillForm.js"></script>
    </body>
</html>
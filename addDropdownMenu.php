<?php
    function addMenu ($max) {
        for ($i = 1; $i <= $max; $i++) {
            echo '<option value=' . $i . '>' . $i . '</option>';
        }
    }
?>
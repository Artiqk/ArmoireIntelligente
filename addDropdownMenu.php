<?php
    function addMenu ($max) {
        for ($i = 0; $i < $max; $i++) {
            echo '<option value=' . $i . '>' . $i . '</option>';
        }
    }
?>
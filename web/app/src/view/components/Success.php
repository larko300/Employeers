<?php
if (!empty($_SESSION['flesh'])) :
    ?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION['flesh'] ?>
    </div>
    <?php
    unset($_SESSION['flesh']);
endif;
?>
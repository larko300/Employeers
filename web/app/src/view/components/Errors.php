<?php if (!empty($data['error'])) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $data['error'] ?>
    </div>
<?php endif; ?>
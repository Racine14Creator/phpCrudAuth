<?php if(count($error) > 0): ?>
    <?php foreach ($error as $errors) :?>
        <div class="alert alert-danger pb-0 shadow shadow-md">
            <p><?= $errors; ?> </p>
        </div>
    <?php endforeach;?>
<?php endif;?>
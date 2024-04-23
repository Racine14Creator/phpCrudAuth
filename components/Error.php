<?php if(count($error) > 0): ?>
    <?php foreach ($error as $errors) :?>
        <div class="alert alert-danger pb-0 shadow shadow-md">
            <p> <?php echo $errors; ?> </p>
        </div>
    <?php endforeach;?>
<?php endif;?>
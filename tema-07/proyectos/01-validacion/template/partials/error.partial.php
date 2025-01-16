<?php if (isset($this->mensaje_error)):?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Mensaje </strong> <?= $this->mensaje_error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>   
        </div>
<?php endif;?>
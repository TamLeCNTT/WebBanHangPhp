<?php $this->layout(config('view.layout')); ?>
<?php $this->start('page'); ?>
<div class="account-login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                <div class="alert alert-success" role="alert">
                    <h3 class="text-danger"> Registration completed </h3>
                    <p><?= $messages['success'] ?></p>
                    <p>Please <a href="/login">Click here</a> to login.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>
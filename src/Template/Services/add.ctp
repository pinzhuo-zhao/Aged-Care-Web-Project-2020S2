<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">
    <ul class="side-nav">
        <ul><?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'pull-right btn btn-oval btn-primary']) ?></ul>
    </ul>
</nav>
    <div class="users-form">
<div class="services form large-9 medium-8 columns content">
    <?= $this->Form->create($service) ?>
    <fieldset>
        <a class="login100-form-title p-b-49">Add a Service</a>

            <div class="wrap-input100 m-b-23">
                <?= $this->Form->control('service_type',['required']) ?>
            </div>
            <div class="wrap-input100 m-b-23">
                <?= $this->Form->control('service_charge',['required']) ?>
            </div>

    </fieldset>
    <?= $this->Form->button(__('Save'), ['class' => 'login100-form-btn']); ?>
    <?= $this->Form->end() ?>
</div>
</div>
</div>

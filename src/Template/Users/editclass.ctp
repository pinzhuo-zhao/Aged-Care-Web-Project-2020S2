<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Class $class
 */
?>



<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">

    </ul>
</nav>



<div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">
<ul><?= $this->Html->link(__('Back'), ['action' => 'classmgmt'], ['class' => 'pull-right btn btn-oval btn-primary']) ?></ul>
    <!-- <div class="back-btn"><a><?= $this->Html->link(__('Back'), ['controller' => 'Users', 'action' => 'classmgmt']) ?></a></div> -->



<div class="wrong-message"><?= $this->Flash->render() ?></div>
<div class="users-form">
<div class="class form large-9 medium-8 columns content">
    <?= $this->Form->create($class) ?>
    <fieldset>
        <a class="login100-form-title p-b-49">Edit the Class</a>
      <div class="wrap-input100 m-b-23">
              <?= $this->Form->control('class_name',['required']) ?>
          </div>
        <div class="wrap-input100 m-b-23">
            <?= $this->Form->control('teacher_id',['required',
            'options' => $user, 'class' => 'select2']) ?>
        </div>
        <div class="wrap-input100 m-b-23">
            <?= $this->Form->control('teacher2_id',[
            'options' => $user, 'class' => 'select2', 'empty' => true]) ?>
        </div>

    </fieldset>
     <?= $this->Form->button(__('Save'), ['class' => 'login100-form-btn']); ?>

    <?= $this->Form->end() ?>
 <div class="related">


                  <?php if (!empty($class->users)): ?>
                  <table class="myTable cellpadding="0" cellspacing="0">
     <h3><?= __('Enrolled Students') ?></h3>
     <thead>
                      <tr>
                         <!--  <th scope="col"><?= __('Class_ID') ?></th>-->
                         <!-- <th scope="col" class="actions"><?= __('User_ID') ?>-->
                          </th><th scope="col" class="actions"><?= __('User_Role') ?></th>

                          <th scope="col" class="actions"><?= __('First_Name') ?></th>
                          <th scope="col" class="actions"><?= __('Family_Name') ?></th>
                          <th scope="col" class="actions"><?= __('Email') ?></th>
                          <th scope="col" class="actions"><?= __('Actions') ?></th>
                      </tr>
     </thead>
     <tbody>
                      <?php foreach ($class->users as $users): ?>
                      <tr>
                        <!--   <td><?= h($users->class_id) ?></td>-->
                         <!--  <td><?= h($users->id) ?></td> -->
                          <td><?= h($users->role) ?></td>
                          <td><?= h($users->first_name) ?></td>
                          <td><?= h($users->surname) ?></td>
                          <td><?= h($users->email) ?></td>

                          <td class="actions">
                           <?= $this->element('edit', ['controller' => 'Users','url' => ['action' => 'edit', $users->id]]) ?>

                          </td>
                      </tr>
                      <?php endforeach; ?>
     </tbody>
                  </table>

                  <?php endif; ?>
              </div>

</div>

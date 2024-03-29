<?php
/**
 * @var \App\Model\Entity\User $user
 * @var App\Model\Entity\Role $role
 */
?>

<?= $this->Html->css('style-2.css') ?>
<div class="header">

    <div class="container">



        <div class="nav mobile">
            <ul>
                <li><?= $this->Html->link(
                        'Home',
                        ['controller' => 'pages', 'action' => 'home', '_full' => true]
                    );?></li>

                <?php if ($this->request->getSession()->read('Auth.User')): ?>
                <?php if ($this->request->getSession()->read('Auth.User.role') == 'admin' ) { ?>
                <li><?= $this->Html->link(
                    'Dashboard',
                    ['controller' => 'users', 'action' => 'home', '_full' => true]
                    );?></li>
                <li><?= $this->Html->link(
                    'Logout',
                    ['controller' => 'users', 'action' => 'logout', '_full' => true]
                    );?></li>
                <?php }?>
                <?php if ($this->request->getSession()->read('Auth.User.role') == 'customer' ) { ?>
                <li><?= $this->Html->link(
                    'Dashboard',
                    ['controller' => 'customers', 'action' => 'home', '_full' => true]
                    );?></li>
                <li><?= $this->Html->link(
                    'Logout',
                    ['controller' => 'users', 'action' => 'logout', '_full' => true]
                    );?></li>
                <?php }?>

                <?php endif; ?>
            </ul>
        </div>
    </div>
    </div>

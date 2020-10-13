
 <?= $this->Html->css('style-2.css') ?>
 <div class="header">
     <div class="container">
     <div class="image1">

         <div class="nav mobile">

             <ul>
                 <li><?= $this->Html->link(
                         'Dashboard',
                         ['controller' => 'customers', 'action' => 'home', '_full' => true]
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
                 <?php if ($this->request->getSession()->read('Auth.User.role') == 'teacher' ) { ?>
                 <li><?= $this->Html->link(
                     'Dashboard',
                     ['controller' => 'teacher', 'action' => 'home', '_full' => true]
                     );?></li>
                 <li><?= $this->Html->link(
                     'Logout',
                     ['controller' => 'users', 'action' => 'logout', '_full' => true]
                     );?></li>
                 <?php }?>
                 <?php if ($this->request->getSession()->read('Auth.User.role') == 'student' ) { ?>
                 <li><?= $this->Html->link(
                     'Dashboard',
                     ['controller' => 'student', 'action' => 'dashboard', '_full' => true]
                     );?></li>
                 <li><?= $this->Html->link(
                     'Profile',
                     ['controller' => 'student', 'action' => 'profile', '_full' => true, $this->request->getSession()->read('Auth.User.id')]
                     );?></li>

                 <li><?= $this->Html->link(
                     'Logout',
                     ['controller' => 'users', 'action' => 'logout', '_full' => true]
                     );?></li>
                 <?php }?>
                 <?php if ($this->request->getSession()->read('Auth.User.role') == 'unverified' ) { ?>
                 <li><?= $this->Html->link(
                     'Dashboard',
                     ['controller' => 'teacher', 'action' => 'home', '_full' => true]
                     );?></li>

                 <li><?= $this->Html->link(
                     'Logout',
                     ['controller' => 'users', 'action' => 'logout', '_full' => true]
                     );?></li>
                 <?php }?>
                 <?php else: ?>
                 <li><?= $this->Html->link(
                     'Free Trial',
                     ['controller' => 'users', 'action' => 'register', '_full' => true]
                     );?></li>
                 <li><?= $this->Html->link(
                     'Login',
                     ['controller' => 'users', 'action' => 'login', '_full' => true]
                     );?></li>
                 <?php endif; ?>



             </ul>
         </div>
     </div>
     </div>
<head>
    <?php echo $this->Html->css('admin'); ?>
    <!-- Bootstrap core CSS-->
    <?php echo $this->Html->css('vendor/bootstrap/css/bootstrap.min.css'); ?>

    <!-- Custom fonts for this template-->
    <?php echo $this->Html->css('vendor/fontawesome-free/css/all.min.css'); ?>

    <!-- Custom styles for this template-->
    <?php echo $this->Html->css('sb-admin.css'); ?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

</head>



<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>

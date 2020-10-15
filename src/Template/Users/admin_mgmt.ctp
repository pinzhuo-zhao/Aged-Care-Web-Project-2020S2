<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>


<div class="users index large-9 medium-8 columns content">
    <?= $this->Flash->render() ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('surname') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('phone_number') ?></th>
            <th scope="col"><?= $this->Paginator->sort('home_address') ?></th>
            <th scope="col"><?= $this->Paginator->sort('extra_information') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->surname) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->phone_number) ?></td>
                <td><?= h($user->home_address) ?></td>
                <td><?= h($user->extra_information) ?></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->numbers() ?>

            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>



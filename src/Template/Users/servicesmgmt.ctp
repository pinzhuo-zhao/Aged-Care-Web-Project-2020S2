<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service[]|\Cake\Collection\CollectionInterface $services
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="services index large-9 medium-8 columns content">
    <h3><?= __('Services') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('service_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('service_type') ?></th>
            <th scope="col"><?= $this->Paginator->sort('service_charge') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($services as $service): ?>
            <tr>
                <td><?= $this->Number->format($service->service_id) ?></td>
                <td><?= h($service->service_type) ?></td>
                <td><?= h($service->service_charge) ?></td>
                <td class="actions">

                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->service_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->service_id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->service_id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

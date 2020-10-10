<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment[]|\Cake\Collection\CollectionInterface $appointments
 */
?>
<link type="text/css" rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
<div class="appointments index large-9 medium-8 columns content">
    <h3><?= __('Appointments') ?></h3>
    <table class="dataTable table">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('beauty_care_service') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_phone') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_datetime') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_comment') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_address') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?= h($appointment->beauty_care_service) ?></td>
                <td><?= h($appointment->appointment_name) ?></td>
                <td><?= h($appointment->appointment_phone) ?></td>
                <td><?= h($appointment->appointment_email) ?></td>
                <td><?= h($appointment->appointment_datetime) ?></td>
                <td><?= h($appointment->appointment_comment) ?></td>
                <td><?= h($appointment->appointment_address) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appointment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id)]) ?>
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
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('.dataTable').DataTable();
    } );
</script>

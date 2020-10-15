<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment[]|\Cake\Collection\CollectionInterface $appointments
 */
?>


<div class="appointments index large-9 medium-8 columns content">
    <?= $this->Flash->render() ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('beauty_care_service') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_phone') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_datetime') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_comment') ?></th>
            <th scope="col"><?= $this->Paginator->sort('appointment_address') ?></th>
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



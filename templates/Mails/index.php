<?php
echo $this->Html->css('MakvilleMailer.style');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-list"></i>
                    <span>
                        <?= ucfirst($status); ?> Messages
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover table-mailbox">
                    <tbody>
                        <?php foreach ($mails as $mail) : ?>
                            <tr class="">
                                <td class="">
                                    <?= $this->Form->postLink('<i class="fontello-trash"></i>', ['plugin' => 'MakvilleMailer', 'controller' => 'mails', 'action' => 'delete', $mail->id], ['escape' => false, 'confirm' => 'Are you sure you want to delete this message']); ?>
                                </td>
                                <td><?= $this->Html->link(substr($mail->name, 0, 25), ['plugin' => 'MakvilleMailer', 'controller' => 'mails', 'action' => 'view', $mail->id], ['title' => $mail->name]); ?></td>
                                <td><?= $this->Html->link(substr(strip_tags($mail->content), 0, 90), ['plugin' => 'MakvilleMailer', 'controller' => 'mails', 'action' => 'view', $mail->id]); ?></td>
                                <td><?= (!is_null($mail->attachments)) ? '<i class="fa fa-paperclip"></i>' : ''; ?></td>
                                <td class="text-right mail-date"><?= $mail->created->timeAgoInWords(); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
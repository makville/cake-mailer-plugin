<?php

echo $this->Html->css('Mail.style');
?>
<div class="row" style="margin-top:-20px">

    <div class="large-12 columns">
        <div class="box">
            <div class="box-header bg-transparent">
                <h3 class="box-title"><i class="fontello-window"></i>
                    <span style="font-size: 14px; font-weight: bold;">
                       <?= ucfirst($status); ?> Messages
                    </span>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hpanel">
                            <div class="panel-heading hbuilt">
                                <!--<div class="text-center p-xs font-normal">
                                    <div class="input-group"><input type="text" class="form-control input-sm" placeholder="Search email in your inbox..."> <span class="input-group-btn"> <button type="button" class="btn btn-sm btn-default">Search
                                    </button> </span></div>
                                </div>-->
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-mailbox">
                                        <tbody>
                                            <?php foreach ($mails as $mail) : ?>
                                            <tr class="">
                                                <td class="">
                                                    <?= $this->Form->postLink('<i class="fontello-trash"></i>', ['plugin' => 'mail', 'controller' => 'mails', 'action' => 'delete', $mail->id], ['escape' => false, 'confirm' => 'Are you sure you want to delete this message']);?>
                                                </td>
                                                <td><?= $this->Html->link(substr($mail->name, 0, 25), ['plugin' => 'mail', 'controller' => 'mails', 'action' => 'view', $mail->id], ['title' => $mail->name]); ?></td>
                                                <td><?= $this->Html->link(substr($mail->content, 0, 90), ['plugin' => 'mail', 'controller' => 'mails', 'action' => 'view', $mail->id]); ?></td>
                                                <td><?= (!is_null($mail->attachments)) ? '<i class="fa fa-paperclip"></i>' : ''; ?></td>
                                                <td class="text-right mail-date"><?= $mail->created;?></td>
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
                </div>
            </div>
        </div>
    </div>
</div>
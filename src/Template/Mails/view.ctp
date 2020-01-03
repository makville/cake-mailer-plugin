<?php

echo $this->Html->css('Mail.style');
?>
<div class="row" style="margin-top:-20px">

    <div class="large-12 columns">
        <div class="box">
            <div class="box-header bg-transparent">
                <h3 class="box-title">
                    <?= $this->Form->postLink('<i class="fontello-trash"></i>', ['plugin' => 'mail', 'controller' => 'mails', 'action' => 'delete', $mail->id], ['escape' => false, 'confirm' => 'Are you sure you want to delete this message']);?>
                    <?= $this->Html->link('<i class="fontello-edit"></i>', ['plugin' => 'mail', 'controller' => 'mails', 'action' => 'compose', $mail->id], ['escape' => false]);?>
                    <!--<span style="font-size: 14px; font-weight: bold;">
                        Message
                    </span>-->
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <div class="row">
                    <div class="hpanel email-compose">
                        <div class="border-top border-left border-right bg-light">
                            <div class="panel-body">
                                <div>
                                    <span class="font-extra-bold">Subject: </span>
                                    <?=$mail->name; ?>
                                </div>
                                <div>
                                    <span class="font-extra-bold">Recipients: </span>
                                    <?= $mail->recipients; ?>
                                </div>
                                <div>
                                    <span class="font-extra-bold">Recipient Lists: </span>
                                    <?php 
                                    $recipientLists = '';
                                    foreach(explode(',', $mail->recipient_mailing_lists) as $listId) {
                                        $recipientLists .= $lists[$listId] . ', ';
                                    }
                                    echo substr($recipientLists, 0, -2);
                                    ?>
                                </div>
                                <div>
                                    <span class="font-extra-bold">Date: </span>
                                    <?= $mail->created; ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div>
                                <h4><?=$mail->name;?></h4>

                                <p><?=$mail->content;?></p>
                            </div>
                        </div>

                        <div class="border-bottom border-left border-right bg-white p-m">
                            <div class="attachments">
                                <ul class="menu-vertical">
                                    <?php
                                    if(isset($mail->attachments)) {
                                        $attachments = explode(',', $mail->attachments);
                                        foreach($attachments as $attachment) {
                                            $parts = explode('|', $attachment);
                                            echo '<li><input type="hidden" name="attachments[]" value="' . $attachment .'" /><a href="#" class="remove-attachment"><i class="fontello-trash"></i></a>&nbsp;<a href="' . $parts[1] . '" target="_blank">' . $parts[0] . '</a></li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-footer text-right">
                            <div class="btn-group">
                                <?= $this->Form->postLink('<button class="btn btn-default"><i class="fontello-trash"></i> Remove</button>', ['plugin' => 'mail', 'controller' => 'mails', 'action' => 'delete', $mail->id], ['escape' => false, 'confirm' => 'Are you sure you want to delete this message']);?>
                                <?= $this->Html->link('<button class="btn btn-default"><i class="fontello-edit"></i> Compose</button>', ['plugin' => 'mail', 'controller' => 'mails', 'action' => 'compose', $mail->id], ['escape' => false]);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
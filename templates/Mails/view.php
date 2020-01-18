<?php
echo $this->Html->css('MakvilleMailer.style');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-envelope"></i>
                    <span><?= $mail->name; ?></span>
                </h3>
                <div>
                    <span class="font-extra-bold">Recipients: </span>
                    <?= $mail->recipients; ?>
                </div>
                <div>
                    <span class="font-extra-bold">Recipient Lists: </span>
                    <?php
                    $recipientLists = '';
                    foreach (explode(',', $mail->recipient_mailing_lists) as $listId) {
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
            <div class="panel-body">
                <div class="mail-content">
                    <?= $mail->content; ?>
                </div>
                <div class="attachments">
                    <ul class="menu-vertical">
                        <?php
                        if (isset($mail->attachments)) {
                            $attachments = explode(',', $mail->attachments);
                            foreach ($attachments as $attachment) {
                                $parts = explode('|', $attachment);
                                echo '<li><input type="hidden" name="attachments[]" value="' . $attachment . '" /><a href="#" class="remove-attachment"><i class="fontello-trash"></i></a>&nbsp;<a href="' . $parts[1] . '" target="_blank">' . $parts[0] . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="panel-footer">
                <div class="btn-group">
                    <?= $this->Form->postLink('<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Remove</button>', ['plugin' => 'MakvilleMailer', 'controller' => 'mails', 'action' => 'delete', $mail->id], ['escape' => false, 'confirm' => 'Are you sure you want to delete this message']); ?>
                    &nbsp;&nbsp;
                    <?= $this->Html->link('<button class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Compose</button>', ['plugin' => 'MakvilleMailer', 'controller' => 'mails', 'action' => 'compose', $mail->id], ['escape' => false]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
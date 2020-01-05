<?php
echo $this->Html->css('MakvilleMailer.style');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-edit"></i>
                    <span>
                        Compose Message
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($mail, ['class' => 'form-horizontal']); ?>
                <div class="panel-heading hbuilt">
                    <div class="p-xs">
                        <div class="form-group"><label class="col-sm-1 control-label text-left">To:</label>
                            <div class="col-sm-11">
                                <?= $this->Form->input('recipients', ['multiple' => 'multiple', 'label' => false, 'options' => $emails, 'class' => 'form-control select2', 'placeholder' => 'example@email.com']); ?>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-1 control-label text-left">List:</label>
                            <div class="col-sm-11">
                                <?= $this->Form->input('recipient_mailing_lists', ['label' => false, 'class' => 'form-control select2', 'options' => $lists, 'empty' => false, 'multiple' => 'multiple', 'value' => explode(',', $mail->recipient_mailing_lists)]); ?>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-1 control-label text-left">Subject:</label>
                            <div class="col-sm-11">
                                <?= $this->Form->input('name', ['label' => false, 'type' => 'text', 'class' => 'form-control input-sm', 'placeholder' => 'Subject']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body no-padding">
                    <?= $this->Form->input('content', ['type' => 'textarea', 'class' => 'editor', 'label' => '']); ?>
                </div>
                <p>&nbsp;</p>
                <div class="panel-footer" style="background: #fff">
                    <?php if (Cake\Core\Plugin::loaded('MakvilleStorage')): ?>
                        <div class="btn-group">
                            <a href="<?= $this->request->webroot . substr(Cake\Core\Configure::read('makville-storage-path', '/makville-storage'), 1) ?>/buckets/show/0/attach" data-featherlight="iframe" data-featherlight-iframe-height="640" data-featherlight-iframe-width="1000" class="btn btn-warning"><i class="fa fa-paperclip"></i> </a>
                        </div>
                        <p>&nbsp;</p>
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
                        <p>&nbsp;</p>
                    <?php endif; ?>
                    <div class="pull-right">
                        <button class="btn btn-info" name="draft">Save as draft</button>
                        &nbsp;&nbsp;
                        <button class="btn btn-primary" name="send">Send</button>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('MakvilleMailer.behaviors/attacher', ['block' => 'scriptBottom']); ?>
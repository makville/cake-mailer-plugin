<?php

echo $this->Html->css('Mail.style');
echo $this->Html->script('Mail.behaviours/mail', ['block' => 'scriptBottom']);
?>
<div class="row" style="margin-top:-20px">

    <div class="large-12 columns">
        <div class="box">
            <div class="box-header bg-transparent">
                <h3 class="box-title"><i class="fontello-window"></i>
                    <span style="font-size: 14px; font-weight: bold;">
                        Compose Message
                    </span>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hpanel email-compose">
                            <?=$this->Form->create($mail, ['class' => 'form-horizontal']); ?>
                            <div class="panel-heading hbuilt">
                                <div class="p-xs">
                                    <div class="form-group"><label class="col-sm-1 control-label text-left">To:</label>
                                        <div class="col-sm-11">
                                                <?= $this->Form->input('recipients', ['label' => false, 'type' => 'text', 'class' => 'form-control input-sm', 'placeholder' => 'example@email.com']); ?>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-1 control-label text-left">List:</label>
                                        <div class="col-sm-11">
                                                <?= $this->Form->input('recipient_mailing_lists', ['label' => false, 'class' => 'form-control input-sm', 'options' => $lists, 'empty' => false, 'multiple' => 'multiple', 'value' => explode(',', $mail->recipient_mailing_lists)]); ?>
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
                                <?=$this->Form->input('content', ['type' => 'textarea', 'label' => '']); ?>
                            </div>

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
                            <div class="panel-footer" style="background: #fff">
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button class="btn btn-default" name="save"><i class="fa fa-edit"></i> Save</button>
                                        <!--<button class="btn btn-default"><i class="fa fa-trash"></i> Discard</button>-->
                                    </div>
                                </div>
                                <button class="btn btn-primary" name="send">Send</button>
                                <div class="btn-group">
                                    <a href="#" data-reveal-id="attachmentModal" class="btn btn-default"><i class="fa fa-paperclip"></i> </a>
                                </div>

                            </div>
                            <?=$this->Form->end();?>
                            <div id="attachmentModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                                <h5 id="modalTitle">Select attachments</h5>
                                <iframe src="<?=$this->request->webroot; ?>storage/buckets/show/0/attach" class="attachment-frame"></iframe>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('Mail.behaviours/attacher', ['block' => 'scriptBottom']);?>
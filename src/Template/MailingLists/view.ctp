<?php
echo $this->Html->css('MakvilleMailer.style');
?>
<div class="row">

    <div class="large-12 columns">
        <div class="box">
            <div class="box-header bg-transparent">
                <h3 class="box-title">
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['plugin' => 'mail', 'controller' => 'mailing-lists', 'action' => 'delete', $mailingList->id], ['escape' => false, 'confirm' => 'Are you sure you want to delete this mailing list']);?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i>', ['plugin' => 'mail', 'controller' => 'mailing-lists', 'action' => 'edit', $mailingList->id], ['escape' => false]);?>
                    <p></p>
                    <span style="font-size: 14px; font-weight: bold;">
                        <?= $mailingList->name; ?>
                    </span>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">


                <div class="row">
                    <div class="col-md-12">
                        <div class="hpanel email-compose">
                            <div class="panel-body">
                                <div>
                                    <a href="#" class="btn btn-success btn-block m-b-md">Addresses under this mailing list</a>
                                </div>
                                <div class="user-emails">
                                    <?php foreach( $mailingList->mailing_list_addresses as $email) : ?>
                                    <div class="user-email">
                                        <span class="pull-left">
                                            <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['plugin' => 'mail', 'controller' => 'mailing-list-addresses', 'action' => 'delete', $email->id], ['escape' => false, 'confirm' => 'Are you sure you want to delete this email address']);?>
                                        </span>&nbsp;
                                        <?=$email->email;?>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
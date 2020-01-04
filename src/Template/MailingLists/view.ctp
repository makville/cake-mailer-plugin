<?php
echo $this->Html->css('MakvilleMailer.style');
?>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-envelope"></i>
                    <span>
                        <?= $mailingList->name; ?>
                    </span>
                </h3>
                <h5><?= $mailingList->description; ?></h5>
            </div>
            <div class="panel-body">
                <span>
                    <?= $this->Form->postLink('<i class="fa fa-trash"></i> Delete list', ['plugin' => 'MakvilleMailer', 'controller' => 'mailing-lists', 'action' => 'delete', $mailingList->id], ['escape' => false, 'confirm' => 'Are you sure you want to delete this mailing list']); ?>
                    <?= $this->Html->link('<i class="fa fa-edit"></i> Edit list', ['plugin' => 'MakvilleMailer', 'controller' => 'mailing-lists', 'action' => 'edit', $mailingList->id], ['escape' => false]); ?>
                </span>
                <p>&nbsp;</p>
                <p>This list contains the following email addresses</p>
                <div class="user-emails">
                    <?php foreach ($mailingList->mailing_list_addresses as $email) : ?>
                        <div class="user-email">
                            <span class="pull-left">
                                <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['plugin' => 'MakvilleMailer', 'controller' => 'mailing-list-addresses', 'action' => 'delete', $email->id], ['escape' => false, 'confirm' => 'Are you sure you want to delete this email address']); ?>
                            </span>&nbsp;
                            <?= $email->email; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
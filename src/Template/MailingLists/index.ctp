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
                        Mailing Lists
                    </span>
                    <span class="float-right">
                        <?= $this->Html->link('Add Mailing List', ['plugin' => 'MakvilleMailer', 'controller' => 'mailing-lists', 'action' => 'add'], ['class' => 'btn btn-success btn-sm']); ?>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="mailbox-list">
                    <?php foreach ($mailingLists as $list) : ?>
                        <li>
                            <?= $this->Html->link('<i class="fa fa-list"></i> ' . $list->name . '<span class="float-right"> contains ' . count($list->mailing_list_addresses) . ' email addresses</span>', ['plugin' => 'MakvilleMailer', 'controller' => 'mailing-lists', 'action' => 'view', $list->id], ['escape' => false]); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
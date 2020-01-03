<?php

echo $this->Html->css('Mail.style');
?>
<div class="row" style="margin-top:-20px">

    <div class="large-12 columns">
        <div class="box">
            <div class="box-header bg-transparent">
                <h3 class="box-title"><i class="fontello-window"></i>
                    <span style="font-size: 14px; font-weight: bold;">
                        Mailing lists
                    </span>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">


                <div class="row">
                    <div class="col-md-3">
                        <div class="hpanel">
                            <div class="panel-body">

                                <?= $this->Html->link('New Mailing List', ['plugin' => 'MakvilleMailer', 'controller' => 'mailing-lists', 'action' => 'add'], ['class' => 'btn btn-success btn-block m-b-md']); ?>

                                <ul class="mailbox-list">
                                    <?php foreach ($mailingLists as $list) : ?>
                                    <li>
                                        <?= $this->Html->link('
                                            <span class="pull-right">' . count($list->mailing_list_addresses) . '</span>
                                            <i class="fa fa-envelope"></i>' . $list->name, ['plugin' => 'MakvilleMailer', 'controller' => 'mailing-lists', 'action' => 'view', $list->id], ['escape' => false]); ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="hpanel email-compose">
                            <div class="panel-body">
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
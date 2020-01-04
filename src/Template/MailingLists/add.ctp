<?php

echo $this->Html->css('Mail.style');
?>
<div class="row">

    <div class="large-12 columns">
        <div class="box">
            <div class="box-header bg-transparent">
                <h3 class="box-title"><i class="fa fa-window-maximize"></i>
                    <span style="font-size: 14px; font-weight: bold;">
                        New mailing list
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
                                    <?= $this->Form->create($mailingList) ?>
                                    <?php
                                        echo $this->Form->input('name');
                                        echo $this->Form->input('description');
                                    ?>
                                    <div class="user-emails">
                                        <?php foreach ($users as $user) : ?>
					<?php
					if ( in_array($user->email, ['ayomakanjuola@gmail.com', 'makville@gmail.com']) ) { continue; }
					?>
                                        <div class="user-email">
                                            <?= $this->Form->input('emails[]', ['type' => 'checkbox', 'label' => false, 'value' => $user->email]) . "&nbsp;" . $user->email;?>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <p>&nbsp;</p>
                                    <?= $this->Form->button(__('Save')) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

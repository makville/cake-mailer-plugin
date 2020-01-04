<?php
echo $this->Html->css('MakvilleMailer.style');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-plus"></i>
                    <span>
                        New Mailing List
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($mailingList) ?>
                <?php
                echo $this->Form->input('name', ['class' => 'form-control']);
                echo $this->Form->input('description', ['class' => 'form-control']);
                ?>
                <p>&nbsp;</p>
                <div class="user-emails">
                    <?php foreach ($users as $user) : ?>
                        <?php
                        if (in_array($user->email, ['ayomakanjuola@gmail.com', 'makville@gmail.com'])) {
                            continue;
                        }
                        ?>
                        <div class="form-check">
                            <?= $this->Form->input('emails[]', ['id' => 'email', 'type' => 'checkbox', 'label' => ' ' . $user->email, 'div' => false, 'value' => $user->email]); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p>&nbsp;</p>
                <?= $this->Form->button(__('Save'), ['class' => 'btn btn-sm btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mails'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mails form large-9 medium-8 columns content">
    <?= $this->Form->create($mail) ?>
    <fieldset>
        <legend><?= __('Edit Mail') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('content');
            echo $this->Form->input('attachements');
            echo $this->Form->input('recipients');
            echo $this->Form->input('recipient_mailing_list');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $billet->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $billet->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Billets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="billets form large-9 medium-8 columns content">
    <?= $this->Form->create($billet) ?>
    <fieldset>
        <legend><?= __('Edit Billet') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('id_user');
            echo $this->Form->control('tags');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthdate') ?></th>
            <td><?= h($user->birthdate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Inscrit') ?></th>
            <td><?= h($user->date_inscrit) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($user->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Lastname') ?></h4>
        <?= $this->Text->autoParagraph(h($user->lastname)); ?>
    </div>
    <div class="row">
        <h4><?= __('Login') ?></h4>
        <?= $this->Text->autoParagraph(h($user->login)); ?>
    </div>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($user->password)); ?>
    </div>
    <div class="row">
        <h4><?= __('Email') ?></h4>
        <?= $this->Text->autoParagraph(h($user->email)); ?>
    </div>
</div>

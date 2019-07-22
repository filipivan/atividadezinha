<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questioncategories'), ['controller' => 'Questioncategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questioncategory'), ['controller' => 'Questioncategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questions view large-9 medium-8 columns content">
    <h3><?= h($question->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Alternative01') ?></th>
            <td><?= h($question->alternative01) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alternative03') ?></th>
            <td><?= h($question->alternative03) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alternative04') ?></th>
            <td><?= h($question->alternative04) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correct') ?></th>
            <td><?= h($question->correct) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Difficulty') ?></th>
            <td><?= h($question->difficulty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Questioncategory') ?></th>
            <td><?= $question->has('questioncategory') ? $this->Html->link($question->questioncategory->id, ['controller' => 'Questioncategories', 'action' => 'view', $question->questioncategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($question->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($question->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($question->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($question->description)); ?>
    </div>
</div>

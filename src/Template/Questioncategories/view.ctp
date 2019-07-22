<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questioncategory $questioncategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Questioncategory'), ['action' => 'edit', $questioncategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Questioncategory'), ['action' => 'delete', $questioncategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questioncategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questioncategories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questioncategory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questioncategories view large-9 medium-8 columns content">
    <h3><?= h($questioncategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($questioncategory->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($questioncategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($questioncategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($questioncategory->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Questions') ?></h4>
        <?php if (!empty($questioncategory->questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Alternative01') ?></th>
                <th scope="col"><?= __('Alternative03') ?></th>
                <th scope="col"><?= __('Alternative04') ?></th>
                <th scope="col"><?= __('Correct') ?></th>
                <th scope="col"><?= __('Difficulty') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Questioncategory Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($questioncategory->questions as $questions): ?>
            <tr>
                <td><?= h($questions->id) ?></td>
                <td><?= h($questions->description) ?></td>
                <td><?= h($questions->alternative01) ?></td>
                <td><?= h($questions->alternative03) ?></td>
                <td><?= h($questions->alternative04) ?></td>
                <td><?= h($questions->correct) ?></td>
                <td><?= h($questions->difficulty) ?></td>
                <td><?= h($questions->created) ?></td>
                <td><?= h($questions->modified) ?></td>
                <td><?= h($questions->questioncategory_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<div id="head">
    <?php echo $this->element('project_head'); ?>
</div>

<div id="backlog">
    <?php echo $this->element('project_backlog'); ?>
</div>

<div id="chat">
    <?php echo $this->element('project_chat'); ?>
</div>


<?php echo $this->Html->script('projects_poker'); ?>
<?php echo $this->Html->script('projects_backlog'); ?>
<?php echo $this->Html->script('projects_chat'); ?>
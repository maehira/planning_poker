<div class="row-fluid">
	<div class="span8">
		<div id="backlog">
		    <?php echo $this->element('project_backlog'); ?>
		</div>
	</div>

	<div class="span4">
		<div id="side">
			<?php echo $this->element('project_side'); ?>
		</div>
	</div>
</div>


<?php echo $this->Html->script('projects_poker'); ?>
<?php echo $this->Html->script('projects_backlog'); ?>

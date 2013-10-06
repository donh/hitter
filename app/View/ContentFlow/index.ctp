<?php
echo $this->Html->script('contentflow');
?>

<div class="ContentFlow">
	<div class="loadIndicator">
		<div class="indicator"></div>
	</div>
	<div class="flow">
		<?php
			//echo $this->Html->image('gates.png', array('alt' => 'Bill Gates'));
		?>
		<img class="item" src="../img/gates.png" title="Bill Gates"/>
		<img class="item" src="../img/jobs.png" title="Steve Jobs"/>
		<img class="item" src="../img/obama.png" title="Barrack Obama"/>
		<img class="item" src="../img/zuckerberg.png" title="Mark Zuckerberg"/>
	</div>
	<div class="globalCaption"></div>
	<div class="scrollbar"><div class="slider"><div class="position"></div></div></div>
</div>
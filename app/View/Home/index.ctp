<?php
if (!Configure::read('debug')):
	throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');
?>
<center><h2>Hello World!</h2></center>
<center><h3>Quick Hitter</h3></center>
<center><a href="/phpinfo.php">phpinfo</a></center>

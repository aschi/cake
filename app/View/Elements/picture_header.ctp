<?php 
	$players = $this->requestAction('players/index/');
	
	shuffle($players); 
	
	$max = 3;
	if(count($players)<3){
		$max = count($players);
	}
	
?>
<div id="headerpics">
	<?php 
		for($i=0;$i<$max;$i++): 
		$player = $players[$i];
	?>
       <img src="<?=$player['Player']['imagepath'];?>" width="100" height="125" alt="" />
	<?php endfor; ?>
</div>
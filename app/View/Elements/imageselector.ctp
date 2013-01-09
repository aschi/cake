<?php echo $this->Html->script("image_selector.js"); ?>  

<?php
echo $this -> Html -> scriptBlock("var cb = function(fieldId){
			browserField = fieldId;  
           	browserWin = window;  
	    	window.open('" . Router::url('/') ."imageuploads/index', 'browserWindow', 'modal,width=600,height=400,scrollbars=yes');
		};
		

		
		ImageSelector.init({	className:'imageSelector', 
									callback:cb,
									buttonLabel: 'Bild auswählen...'
							});");		

		
		

?> 
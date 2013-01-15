var ImageSelector = function(){};
ImageSelector.init = function(config) {
	var el = document.getElementsByClassName(config.className);

	for (var i = 0; i < el.length; i++) {
		var fieldId = el[i].id;

		var buttonnode = document.createElement('input');
		buttonnode.type = 'button';
		buttonnode.name = 'selectImage';
		buttonnode.value = config.buttonLabel;
		buttonnode.className = 'imageSelectorButton';
		buttonnode.onclick = function(){config.callback(fieldId)};
		el[i].width = 600;
		el[i].parentNode.appendChild(buttonnode);
	}
}
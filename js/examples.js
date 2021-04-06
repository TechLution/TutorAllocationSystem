$(function () {
	var example = $('#example');
	switch (example.attr('data-icon')) {
		case 'fa':
			Msg.icon = Msg.ICONS.FONTAWESOME;
			break;
			
		case 'bs':
			Msg.icon = Msg.ICONS.BOOTSTRAP;
			break;
			
		case 'no':
			Msg.iconEnabled = false;
			break;
			
		default:
			Msg.icon = {
				info: 'fa fa-info-circle',
				success: 'fa fa-check-circle',
				warning: 'fa fa-exclamation-circle',
				danger: 'fa fa-times-circle'
			};
	}
	
	Msg.extraClass = example.attr('data-extra-class');
	
});
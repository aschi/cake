<?
$total = $this->requestAction('bookings/total');

switch($mode){
	case 'total':
		echo $total['total'].' CHF';
		break;
	case 'income':
		echo $total['income'].' CHF';
		break;
	case 'expenses':
		echo $total['expenses'].' CHF';
		break;
}
?>
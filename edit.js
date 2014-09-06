function editObject(button,objectID){
	var tr = button.parentNode.parentNode;
	tr.innerHTML = '<form id="objectForm' + objectID + '" action="editObject.php" method="post"><input form="objectForm' + objectID + '" type="hidden" name="uid" value="' + objectID + '">' + tr.innerHTML + '</form>';
	tr.getElementsByTagName('td')[0].innerHTML = '<input form="objectForm' + objectID + '" type="text" name="name" value="' + tr.getElementsByTagName('td')[0].innerHTML + '">';
	tr.getElementsByTagName('td')[1].innerHTML = '<input form="objectForm' + objectID + '" type="text" name="description" value="' + tr.getElementsByTagName('td')[1].innerHTML + '">';
	tr.getElementsByTagName('td')[2].innerHTML = '<input form="objectForm' + objectID + '" type="submit" value="Save">';

}

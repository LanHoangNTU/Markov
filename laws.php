<?php 
	require_once("class.listolaw.php");	

	$array = array();
	$llist = new LawList(); //List of laws

	$array[] = new Condition("NV", "<=", 8.5);
	$array[] = new Condition("TO", ">=", 9.5);
	$array[] = new Condition("NN", "<", 9.5);
	$law = new Law($array, "TO");
	$llist->list_o_law[] = $law;

	$array[0] = new Condition("NV", "<=", 8.5);
	$array[1] = new Condition("TO", "<", 9.5);
	$array[2] = new Condition("NN", ">", 9.5);
	$law1 = new Law($array, "NN");
	$llist->list_o_law[] = $law1;

	$array[0] = new Condition("NV", "<=", 8.5);
	$array[1] = new Condition("TO", ">=", 9.0);
	$array[2] = new Condition("NN", "<", 9.0);
	$law2 = new Law($array, "TO");
	$llist->list_o_law[] = $law2;
 ?>
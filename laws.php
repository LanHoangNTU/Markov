<?php 
	require_once("class.listolaw.php");	

	$array = array();
	$llist = new LawList();

	$array[0] = new Condition("NV", "<=", 8.5);
	$array[1] = new Condition("TO", "<", 9.0);
	$array[2] = new Condition("NN", "<", 9.0);
	$array[3] = new Condition("HH", ">=", 9.0);
	$law = new Law($array, "HH");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<=", 8.5);
	$array[1] = new Condition("TO", ">=", 8);
	$array[2] = new Condition("NN", "<", 9.5);
	$array[3] = new Condition("VL", "<", 9.5);
	$array[4] = new Condition("HH", "<", 9.5);
	$law = new Law($array, "TO");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<=", 6.5);
	$array[1] = new Condition("TO", ">=", 7.5);
	$array[2] = new Condition("NN", "<", 8.5);
	$array[3] = new Condition("VL", ">=", 9.5);
	$array[4] = new Condition("HH", ">", 7.5);
	$law = new Law($array, "VL");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<=", 8.5);
	$array[1] = new Condition("TO", "<", 7.5);
	$array[2] = new Condition("NN", ">", 9.5);
	$array[3] = new Condition("VL", "<", 6.5);
	$array[4] = new Condition("HH", "<", 6.5);
	$law = new Law($array, "NN");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<=", 7);
	$array[1] = new Condition("TO", "<", 9.5);
	$array[2] = new Condition("NN", "<", 9.5);
	$array[3] = new Condition("VL", "<", 9.5);
	$array[4] = new Condition("HH", ">=", 9.5);
	$law = new Law($array, "HH");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<=", 7.5);
	$array[1] = new Condition("TO", ">", 9.0);
	$array[2] = new Condition("NN", "<", 9.0);
	$array[3] = new Condition("VL", "<", 9.0);
	$array[4] = new Condition("HH", "<", 9.0);
	$law = new Law($array, "TO");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<=", 8.5);
	$array[1] = new Condition("TO", "<", 9.0);
	$array[2] = new Condition("NN", "<", 9.0);
	$array[3] = new Condition("VL", ">=", 9.0);
	$array[4] = new Condition("HH", "<", 9.0);
	$law = new Law($array, "VL");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<=", 8.5);
	$array[1] = new Condition("TO", "<", 9.0);
	$array[2] = new Condition("NN", ">", 9.0);
	$array[3] = new Condition("VL", "<", 9.0);
	$array[4] = new Condition("HH", ">=", 9.0);
	$law = new Law($array, "NN");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<", 7.5);
	$array[1] = new Condition("NV", ">=", 6.0);
	$array[2] = new Condition("TO", ">=", 8.5);
	$array[3] = new Condition("NN", "<", 7.5);
	$array[4] = new Condition("VL", "<", 8.5);
	$array[5] = new Condition("HH", "<", 8.5);
	$law = new Law($array, "TO");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<", 7.5);
	$array[2] = new Condition("TO", "<", 8.5);
	$array[3] = new Condition("NN", "<", 7.5);
	$array[4] = new Condition("VL", ">=", 8.5);
	$array[5] = new Condition("HH", "<", 7.5);
	$law = new Law($array, "VL");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<", 7.5);
	$array[1] = new Condition("NV", ">=", 6.0);
	$array[3] = new Condition("NN", "<", 8.5);
	$array[5] = new Condition("HH", ">=", 8.5);
	$law = new Law($array, "HH");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<", 7.5);
	$array[1] = new Condition("NV", ">=", 7.0);
	$array[2] = new Condition("TO", "<", 8.5);
	$array[3] = new Condition("NN", ">=", 8.5);
	$array[4] = new Condition("VL", "<", 8.5);
	$array[5] = new Condition("HH", "<", 8.5);
	$law = new Law($array, "NN");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", "<", 8.5);
	$array[1] = new Condition("NV", ">=", 8.0);
	$array[2] = new Condition("TO", "<", 8.5);
	$array[3] = new Condition("NN", "<", 8.5);
	$array[4] = new Condition("VL", "<", 8.5);
	$array[5] = new Condition("HH", "<", 8.5);
	$law = new Law($array, "NV");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("VL", ">=", 8.0);
	$array[1] = new Condition("TO", ">=", 8.0);
	$array[2] = new Condition("HH", ">=", 9.0);
	$law = new Law($array, "HH");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("VL", ">=", 8.0);
	$array[1] = new Condition("HH", ">=", 8.0);
	$array[2] = new Condition("TO", ">=", 9.0);
	$law = new Law($array, "TO");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("TO", ">=", 8.0);
	$array[1] = new Condition("HH", ">=", 8.0);
	$array[2] = new Condition("VL", ">=", 9.0);
	$law = new Law($array, "VL");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NV", ">=", 9.0);
	$array[1] = new Condition("NN", ">=", 8.0);
	$array[2] = new Condition("TO", "<=", 8.0);
	$law = new Law($array, "NV");
	$llist->list_o_law[] = $law;

	$array = array();
	$array[0] = new Condition("NN", ">=", 9.0);
	$array[1] = new Condition("NV", ">=", 8.0);
	$array[2] = new Condition("TO", "<=", 8.0);
	$law = new Law($array, "NN");
	$llist->list_o_law[] = $law;
 ?>
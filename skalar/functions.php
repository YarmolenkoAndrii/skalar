<?php

require "ajax.php";

function set_value ($name,$default = ''){
	return (!empty($_POST[$name])) ? trim(htmlspecialchars($_POST[$name])): $default;
}

function show_avatar ($uploaddir,$filename){
	if(!empty($uploaddir) && !empty($filename)){
		return '<img src="'.$uploaddir.'/'.$filename.'" alt="'.$filename.'">';
	}	
	else{
		return '<img src="images/skalar.png" alt="skalar">';
	}
}

function pagination ($total,$per_page,$num_links,$start_row,$url=''){
	
	$num_pages = ceil($total/$per_page); 
	
	if ($num_pages <= 1) return '';
	
	$cur_page = $start_row; 	

	if ($cur_page > $total){
		$cur_page = ($num_pages - 1) * $per_page;
	}
	
	$cur_page = floor(($cur_page/$per_page) + 1);	
	$start = (($cur_page - $num_links) > 0) ? $cur_page - $num_links : 0;	
	$end   = (($cur_page + $num_links) < $num_pages) ? $cur_page + $num_links : $num_pages;
	
	$output = '<span class="pagination">';

    for ($loop = $start; $loop <= $end; $loop++){
		$i = ($loop * $per_page) - $per_page;

		if ($i >= 0)
		{
			if ($cur_page == $loop)
			{
				$output .= '<span>'.$loop.'</span>';
			}
			else
			{
				$n = ($i == 0) ? '' : $i;
				$output .= '<a href="'.$url.'?p='.$i++.'">'.$loop.'</a>';
			}
		}
	}

	// if (($cur_page + $num_links) < $num_pages){
	// 	$i = (($num_pages * $per_page) - $per_page);
	// 	$output .= '<a href="'.$url.'?p='.$i.'" title="Последняя"><img src="images/right_active.png"></a>';
	// }	
	
	return '<div class="wrapPaging">'.$output.'</div>';
}

?>

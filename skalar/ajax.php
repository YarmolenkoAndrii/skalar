<?php
require_once "config.php";
require_once "functions.php";

if(isset($_REQUEST['sort'])&&isset($_REQUEST['limit'])){
    $uploaddir = 'images/avatars';
    $feedbacks = array();
    $sort = $_REQUEST['sort'];
    $per_page = $_REQUEST['limit'];
    $start_row = (!empty($_GET['p']))? intval($_GET['p']): 0;	
	$result = DB::query('SELECT users.name, subjects.subject, feedback_description, feedbacks.image, count_feedback, date_feedback FROM `feedbacks` JOIN `subjects` ON feedbacks.id_subject=subjects.id JOIN `users` ON feedbacks.id_user=users.id ORDER BY date_feedback '.$sort.' LIMIT '.$start_row.','.$per_page);
	
	while($row = $result->fetch_assoc()){
        if($row['image']){
            $row['image'] = show_avatar($uploaddir,$row['image']);
        }
        if( $row['image'] == ''){
            $row['image'] = '<img src="images/skalar.png" alt="skalar">';
        };
        $feedbacks[] = $row;   
    }    
	echo json_encode($feedbacks);
    exit;
}
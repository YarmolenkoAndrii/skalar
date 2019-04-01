<?php 
session_start();
require_once "config.php";
require_once "functions.php";
require_once "header.php";

$appath = realpath(dirname(__FILE__)).'/';
$uploaddir = 'images/avatars';
$sort = "ASC";
$limit = (isset($_POST['limit'])) ? $_POST['limit'] : 7;
$num_page = (isset($_GET['p'])) ? $_GET['p'] : 1;

$count = DB::query('SELECT COUNT(*) AS numrows FROM feedbacks');
$total = $count->fetch_object()->numrows;

$start_row = (!empty($_GET['p']))? intval($_GET['p']): 0;
if($start_row < 0) $start_row = 0;
if($start_row > $total) $start_row = $total;

if(isset($_POST['submit'])){
	$now = date('Y-m-d');
	$errors = array(); 
	$name = (!empty($_POST['name'])) ? trim(strip_tags($_POST['name'])) : false;
	$subject = (!empty($_POST['subject'])) ? $_POST['subject'] : false;
    $text = (!empty($_POST['text'])) ? trim(strip_tags($_POST['text'])) : false;
	$keystring = (!empty($_POST['keystring'])) ? $_POST['keystring'] : false;
	print_r('$keystrin -'.$keystring); echo '<br>';
	print_r('$_SESSION -'.$_SESSION['keystring']);
		
	if (empty($name)) $errors[] = '<div class="error">Вы не заполнили поле "Имя"</div>'; 
	if (empty($subject)) $errors[] = '<div class="error">Вы не выбрали тематику</div>';
	if (empty($text)) $errors[] = '<div class="error">Вы не заполнили "Отзыв"!</div>'; 
	// if (!$keystring || $keystring != $_SESSION['keystring']) $errors[] = '<div class="error">Вы не правильно ввели цифры с картинки!</div>'; 
			
	if (!empty($_FILES['image']['tmp_name'])) {	    	
					
		$tmp_name = $_FILES['image']['tmp_name'];
		$file_mime = $_FILES['image']['type'];
		
		list($m1, $m2) = explode('/', $file_mime);
		if ($m1 == 'image') {
			$file_ext = strtolower(strrchr($_FILES['image']['name'],'.')); 
			if(($file_ext == '.png')||($file_ext == '.jpg')){
				$file_name = uniqid(rand(9999,100000));
				$avatar = $file_name.$file_ext;				
				if (move_uploaded_file($tmp_name, $appath.$uploaddir.'/'.$avatar)) {					
					chmod( $appath.$uploaddir.'/'.$avatar, 0666);					
				}
			} else {
				echo 'Файл не загружен. (нeверный формат файла!)';
			}			
		} else {
			echo 'Файл не загружен. (нeверный тип файла!)';
		}       
	}

	$like = (!empty($_POST['like'])) ? intval($_POST['like']) : 1;   	
	$avatar = (!empty($avatar)) ? $avatar: '';
	if(!$errors){		
		require "class/user_class.php";
		$user = new User;
		$user_id = $user->getUserId($name);
		if($user_id){
			DB::query("INSERT INTO feedbacks (`id_user`, `id_subject`, `feedback_description`, `date_feedback`, `image`, `count_feedback`)
			VALUES ('".$user_id."','".DB::esc($subject)."','".DB::esc($text)."','".$now."','".DB::esc($avatar)."','".$like."')");		
			if(DB::getMySQLiObject()->affected_rows == 1){
				echo 'Ваш отзыв успешно добавлен!';
			} else{
				echo 'Ваш отзыв не добавлен!';
			}			
		}
		header("Location: /skalar ");
		// unset($_SESSION['keystring']);	
	} else {
		echo '<div class="errors">'.implode($errors).'</div>';
	}

		
}

require_once "content.php";
require_once "footer.php";
?>     


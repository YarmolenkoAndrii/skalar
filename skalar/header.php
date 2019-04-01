<?php 
require "class/subject_class.php";
$subjects = new Subject; 
?>

<!DOCTYPE html>
	<head>        
	    <title>Книга отзывов</title>
	    <link rel="stylesheet" href="css/style.css" type="text/css" /> 	 
    </head>
    <body>
    
	<div class="content">
    <h1>Отзывы</h1>
        <div class="add_feedback" id="add_block" >
            <h2>Заполните отзыв</h2>
            <form action="index.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <label for='name'>Имя:</label>
                <input class="text" name="name" value="<?=set_value('name');?>" type="text"/><br>
                <label>Тематика:</label>
                <select required id="subject" name="subject">
                    <option selected="selected" disabled>Выберите тематику ...</option>
                    <?php foreach($subjects->getSubject() as $subject){ ?>
                        <option value="<?php echo $subject['id']?>"><?php echo $subject['subject']; ?></option>
                    <?php } ?>
                </select><br>
                <label>Отзыв:</label>
                <textarea cols="15" rows="5" name="text" id="com_text"><?=set_value('text');?></textarea><br>
                <label>Изображение:</label>
                <input class="file" name="image" type="file"><br>
                <label>Лайк к отзыву:</label>
                <input class="text" name="like" value="<?=set_value('like');?>" type="text"><br>
                <label>Введите цифры:</label>
                <input class="capch" name="keystring" value="" maxlength="6" type="text"><br>
                <div class="plusClear mb plusOverflow">                
                    <?php require 'captcha.php';?>                   
                </div>
                <input class="but" name="submit" value="Отправить" type="submit">
            </form>
        </div>

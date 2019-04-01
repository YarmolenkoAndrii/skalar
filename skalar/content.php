<div class="feedbacks">
<?php 
    $result = DB::query('SELECT * FROM `feedbacks` JOIN `subjects` ON feedbacks.id_subject=subjects.id JOIN `users` ON feedbacks.id_user=users.id ORDER BY date_feedback '.$sort.' LIMIT '.$start_row.','.$limit);
    $feedbacks = array();
    while($row = $result->fetch_assoc()){
        $feedbacks[] = $row;
    }
    if(($feedbacks) && !empty($feedbacks)) {
    ?>
        <table class="table_feedbacks" border="1px">
            <thead>
                <tr>
                    <th>ФИО</th>
                    <th>Тематика</th>
                    <th>Отзыв</th>
                    <th>Изображение</th>
                    <th>Количество лайков</th>
                    <th class="sort_date">Дата</th>
                </tr>           
            </thead>
            <tbody>
            <?php foreach($feedbacks as $feedback) { ?>
                <tr>
                    <td><?php echo $feedback['name'];?></td>
                    <td><?php echo $feedback['subject'];?></td>
                    <td><?php echo $feedback['feedback_description'];?></td>
                    <td><?php echo show_avatar($uploaddir,$feedback['image']);?></td>
                    <td><?php echo $feedback['count_feedback'];?></td>
                    <td><?php echo $feedback['date_feedback'];?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="no_feedbacks"><h2>На данный момент нет отзывов!</h2></div>
    <?php } ?>
    <?php if ($total > 7) { ?> 
        <div class="per_page">
            Вывести 
            <select name="select_limit" id="select_limit" onchange="OnSelectionChange (this)">
                <option value="7">7</option>
                <option value="14">14</option>
                <option value="21">21</option>
                <option value="70">70</option>
            </select>
            отзывов
        </div>
    <?php } ?>
   
	</div>
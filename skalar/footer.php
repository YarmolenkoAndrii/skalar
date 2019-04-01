<?php 
    $likes = $subjects->getCountLike();   
    $maxIdSubject = array_keys($likes, max($likes));   
?>            												
            <div class="opinion">
                <h4>Мнение :</h4> 
                <?php 
                if($maxIdSubject[0] == 1){
                    echo '<p>Клиенты нас любят</p>';
                }
                if($maxIdSubject[0] == 2){
                    echo '<p>Нам надо совершенствоваться</p>';
                }
                if($maxIdSubject[0] == 3){
                    if(max($likes) > (array_sum($likes) - max($likes))){
                        echo '<p>Надо сжечь это место</p>';
                    } else{
                        echo '<p>Пора меняться</p>';
                    }                
                }
                ?>	
            </div>
        </div>
	</body>
	<script type="text/javascript" src="js/scripts.js"></script> 
</html>


<?php
class User
{
    protected $table_user = 'users';
          
    public function getUserId($name)
    {
        $user = DB::query('SELECT `id` FROM '.$this->table_user.' WHERE name = "'.$name.'"');
        if($user->fetch_assoc()){           
            $user_id = $user->fetch_assoc()['id'];
            return $user_id;            
        }elseif($user->fetch_object()){
            $user_id = $user->fetch_assoc()->id;
            return $user_id; 
        } else {
            $this->setUser($name);
        }        
    }   
  
    public function setUser($name)
    {
        
        $user = DB::query('INSERT INTO '.$this->table_user.' (`name`) VALUES ("'.$name.'")');
        
        if(DB::getMySQLiObject()->affected_rows == 1){
            $this->getUserId($name);
		}
		else{
			echo 'ФИО не добавлено!';
        }           
    }  
    
}
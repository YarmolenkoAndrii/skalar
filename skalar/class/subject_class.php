<?php
class Subject
{
    private $table_subject = 'subjects';
    private $table_feedbacks = 'feedbacks';
      
    public function getSubject()
    {

        $items = array();
        $subjects = DB::query('SELECT * FROM '.$this->table_subject);
        
        while($row = $subjects->fetch_assoc()){
            $items[] = $row;
        }

        return $items;
    }   

  
    public function getCountLike()
    {
        $items = array();
        $likes = DB::query('SELECT `id_subject` as id, sum(`count_feedback`) as likes FROM '.$this->table_feedbacks.' GROUP BY `id_subject`');
        
        while($row = $likes->fetch_assoc()){
            $items[$row['id']] = $row['likes'];
        }

        return $items;
    //    
    }

    // public function getSortLikes(&$data)  
    // {  
       
    //     return usort($data , maxCountLikesId());
    // }

    // public function maxCountLikesId($data)  
    // {  
    //     return 1;
    //     // return strcasecmp($a["name"], $b["name"]);  
    // }
    

   
    
}
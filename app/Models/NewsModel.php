<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class NewsModel extends Model{

        protected $table = 'news';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id', 'title','body','slug'];
        public function getNews($id = null){
            if($id === null){
                return $this->findAll();
            }else
            {
                return $this->asArray()->where(['id'=> $id])->first();
            }
        }
    }
?>


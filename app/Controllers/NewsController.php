<?php
    namespace App\Controllers;
    use App\Models\NewsModel;
    use CodeIgniter\Controller;

    class NewsController extends Controller{

        public function index(){
           $model = new NewsModel();
           $data=
           [
            'news'=>$model->getNews()
           ];
           echo view('templates/header');
           echo view('pages/overview',$data);
           echo view('templates/footer');
        }
        public function view($id = null){
            $model = new NewsModel();
            $data['news']=$model->getNews($id);
            if (empty($data['news'])) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException("no se pudo encotrar");
            }else
            {
                $data['title']=$data['news']['title'];
                echo view('templates/header');
                echo view('pages/view',$data);
                echo view('templates/footer');
            }
        }

        public function create(){
            helper('form');
            echo view('templates/header');
            echo view('pages/form');
            echo view('templates/footer');
        }

        public function store(){
            helper('form');
            $model = new NewsModel();
            $rules = [
                "title"=> "required",
             
            ];
            if ($this->validate($rules)) {
                $model->save([
                    'id'=> $this->request->getVar('id'),
                    'title'=> $this->request->getVar('title') ,
                    'body'=> $this->request->getVar('body') ,
                    'slug'=> $this->request->getVar('slug') ,
                ]);

                echo view('templates/header');
                echo view('pages/succes');
                echo view('templates/footer');
            }else
            {
                echo view('templates/header');
                echo view('pages/form');
                echo view('templates/footer');
            }
        }

    public function edit($id){
            $model = new NewsModel();
            $data['news'] = $model->getNews($id);
            if(empty($data['news'])){

            }

            $data = [
                'id'=> $data['news']['id'],
                'title'=>$data['news']['title'],
                'body'=> $data['news']['body'],
                'slug'=> $data['news']['slug'] ,

            ];

            echo view('templates/header');
            echo view('pages/form',$data);
            echo view('templates/footer');
        }

    public function delete($id){
        $model = new NewsModel();
        $model->delete($id);
        echo view('templates/header');
        echo view('pages/delete');
        echo view('templates/footer');
    }

}

   
?>


<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


namespace admin;
use EZPHP\base;
use EZPHP\core\model;
use newsModel;
use adminController;
use EZPHP\exception\ezException;
use EZPHP\model\ISaveModel;

class newsController extends adminController  {



    public function listAction(){



        $page  = $_GET['page']?:1;


        $type = \typeModel::intance()->getModuleEnum(\typeModel::MODULE_NEWS);


        $pageObj = new page(newsModel::intance(),array('*'),$page);


//        $data = [];
//
//        foreach ($res as $v) {
//            $data[$v['field']] = $v['content'];
//        }


//        var_dump(postModel::intance()->getSql());





        $this->render(array(
            'page'=>$pageObj,
            'type'=>$type,
        ));
    }

    public function saveAction()
    {
        $id = $_REQUEST['id'];


        $data = array(
            'content'=>$_REQUEST['content'],
            'title'=>$_REQUEST['title'],
            'time'=>strtotime($_REQUEST['time']),
            'source'=>$_REQUEST['source'],
            'type'=>$_REQUEST['type'],
            'update_time'=>time(),
        );


        if($id){
            $res=newsModel::intance()->chgOne($data,$id);
        }else{

            $res =newsModel::intance()->addOne($data);
        }




        if( $res ){
            $this->json();
        }else{
            //todo 这里 这么做 json  的 exception  现在是 html
            throw new ezException('保存失败');

        }
    }

    public function delAction()
    {
        $id = $_REQUEST['id'];

        $res = false;
        if($id){
            $res=newsModel::intance()->delOne($id);
        }



        if( $res ){
            $this->json();
        }else{
            //todo 这里 这么做 json  的 exception  现在是 html
            throw new ezException('保存失败');

        }
    }


    public function editAction()
    {
        $id = $_REQUEST['id'];

        $res = \newsModel::intance()->getOne($id);
        $type = \typeModel::intance()->getModule(\typeModel::MODULE_NEWS);


        $this->render(array(
            'data'=>$res,
            'type'=>$type,
        ));


    }


}



class newsPage extends page {
    public function __construct()
    {


    }


    public function aaa()
    {

        $count = newsModel::intance()->getCount();

        return $count;
    }


}

class page  extends base {


    public $data;
    public $count;
    public $page;
    public $curPage;

    public function __construct(model $model,Array $field=array('*'),$curPage = '1')
    {
//    public function __construct(Model $model,Condition $condition)


        $this->curPage = $curPage;

        $size = 10;

        $this->data=$model->db()
            ->setOrder(array(
                'time'=>'desc'
            ))
            ->setField($field)
            ->setLimit(($curPage-1)*$size,$size)
            ->query();


        $this->count=$model->db()
            ->setField(array('count(*) as count'))
            ->query(true)['count'];


        $pageNum= ceil($this->count/$size);
        $this->page = array();


        for ($i = 1; $i <= $pageNum; $i++) {
            $this->page[]=$i;
        }




        if( $pageNum > 7 ){


            foreach($this->page as $k => $v) {

                if($v != 1 &&  $v != $this->page[$pageNum-1]  &&  ($v > $curPage + 2  ||  $v  < $curPage - 2) ){

                        unset($this->page[$k]);

                }

            }


        }



        foreach ($this->page as $k => $v) {
            
            if(  $k > 1 &&   !array_key_exists($k - 1,$this->page) ){


                $this->page[$k-1]='...';
            }

        }

        ksort($this->page);

    }

}
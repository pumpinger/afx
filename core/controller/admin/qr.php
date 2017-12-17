<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


namespace admin;
use picModel;
use adminController;
use EZPHP\exception\ezException;
use EZPHP\model\ISaveModel;

class qrController extends adminController  {



    public function indexAction(){



        $res = picModel::intance()->getAll();
        $res = [$res[count($res) -1]];
//
//        $data = [];
//
//        foreach ($res as $v) {
//            $data[$v['field']] = $v['content'];
//        }


//        var_dump(postModel::intance()->getSql());


        $this->render(array(
            'data'=>$res
        ));
    }

    public function saveAction()
    {

        $res = true;
        foreach ($_REQUEST['qr'] as  $k => $v) {


            if(!$v){
                continue;
            }


            $res=picModel::intance()->chgOne(array(
                    'pic'=>$v,
            ),$k);

            if( ! $res ){
                break;
            }
        }



        if($res){
            $this->json();
        }else{
            throw new ezException('保存失败');


        }



    }


}
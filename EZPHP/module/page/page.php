<?php
/**
 * Created by PhpStorm.
 * User: van
 * Date: 2018/1/8
 * Time: 上午9:58
 */

namespace EZPHP\module\page;

use EZPHP\base;
use EZPHP\core\db;

class page  extends base {


    public $data;
    public $count;
    public $page;
    public $curPage;

    public function __construct(db $condition,$curPage = 1)
    {
//    public function __construct(Model $model,Condition $condition)


        $this->curPage = $curPage;

        $size = C('page_size');

        $this->data=$condition
            ->setLimit(($curPage-1)*$size,$size)
            ->query();





        //todo  这里 不重新 setlimie  就会让 count  也有 limit，怎么样 condition保留设置的值，而重新set的不会保留（上一步的limit 不想保留）
        $this->count=$condition
            ->setLimit(null,0)
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
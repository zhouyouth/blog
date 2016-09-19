<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    protected $primaryKey="cate_id";
    public    $timestamps=false;
    public static function  tree(){
        $category = self::all();
        return  self::getTree($category,'cate_id','cate_pid','0','┃━━━');
    }
    public static function  getTree($data,$id,$pid,$leve=0,$cate_tag)
    {
        $arr= array();
        foreach ($data as $k=> $v) {
            if ($v->$pid==$leve) {
                $v['_cate_name']= $v['cate_name'];
                //$arr[]=$data[$k];
                $arr[]=$v;
                foreach($data as $m => $n){
                    if($n->$pid ==$v->$id){
                        $n['_cate_name'] =$cate_tag.$n['cate_name'];
                        $arr[] = $n;
                    }

                }
            }
        }
        return $arr;
    }
}

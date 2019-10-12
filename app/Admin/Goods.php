<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //设置商品表名
    protected $table='vk_goods';
	//取消默认时间字段
	public $timestamps=false;
	//设置白名单
	protected $fillable=['tid','name','price','store','descript','addtime','color','status','pic'];
}

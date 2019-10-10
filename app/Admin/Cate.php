<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
	//设置表名
    protected $table='vk_type';
	//取消默认时间字段
	public $timestamps=false;
	//设置白名单
	protected $fillable=['name'];
}

<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Friend extends Model
{
    //连接表
    protected $table = 'friends';
//    过滤时间
    public $timestamps = false;
    //调用create方法
    protected $fillable = ['id','user1id','user2id','status'];
    //设置黑名单
//    protected $guarded = [''];
////设置主键
//    protected $primaryKey = 'id';
}

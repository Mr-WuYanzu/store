<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Goods extends Model
{
    //

    protected $table = 'shop_goods';
    public $timestamps = false;
}
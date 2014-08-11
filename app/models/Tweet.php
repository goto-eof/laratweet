<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Carbon\Carbon;
class Tweet extends \Eloquent
{
    use SoftDeletingTrait;

    protected $table = "Tweets";
    protected $fillable = [];
    protected $dates = ['deleted_at'];

}
<?php
/**
 * Created by heycode.
 * User: heycode
 * Date: 2016/8/25
 * Time: 10:21
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
    public $timestamps = false;
    protected $fillable = ['user_id', 'comment', 'time'];
    public function news(){
        $news = $this->belongsTo('App\Models\News', 'comment_id');
        $oneNews = $news->get();
        return $oneNews;
    }

    

}

?>
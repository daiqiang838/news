<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model{
    public $timestamps = false;
    protected $guarded = ['id'];

    /*
     * 返回所有指定新闻
     *
     * */
    public function getAllNews($isHot='9'){
        switch ($isHot){
            case '0' :
                $newList = $this->where('delete' ,'=','0')->where('isHot','=','0')->orderBy('id','desc')->paginate(5);
                break;
            case '1' :
                $newList = $this->where('delete' ,'=','0')->where('isHot','=','1')->orderBy('id','desc')->paginate(5);
                break;
            default :
                $newList = $this->where('delete' ,'=','0')->orderBy('id','desc')->paginate(5);
                break;
        }
        return $newList;
    }

    /*
     * 根据 id 获取新闻
     * */
    public function getNewsById($newsId){
        $newsId = intval($newsId);
        $newsInfo = $this->where('id','=',$newsId)->first();
        if(!$newsInfo){
            return null;
        }
        return $newsInfo;
    }


    // 垃圾箱新闻
    public function refuseNews(){
        return $this->where('delete' ,'=','1')->orderby('id','desc')->paginate(5);
    }


    /*
     * 添加新闻
     * $new  array
     * return Boolean
     *
     * */
    public function addNews($news=[]){
        $this->newsTitle = isset($news['newsTitle']) ? strip_tags($news['newsTitle']) : '';
        $this->author = isset($news['author']) ? strip_tags($news['author']) : '';
        $this->type = isset($news['type']) ? strip_tags($news['type']) : '';
        $this->isHot = isset($news['isHot']) ? $news['isHot'] : '';
        $this->content = isset($news['content']) ? $news['content'] : '';
        $this->delete = '0';
        $this->time = time();

        $res = $this->save();
        return $res;
    }

    //更新新闻
    public function updataNews($news=[]){
        $newsId = intval($news['id']);
        $newsInfo = $this->find($newsId);
        $newsInfo->newsTitle = isset($news['newsTitle']) ? strip_tags($news['newsTitle']) : '';
        $newsInfo->author = isset($news['author']) ? strip_tags($news['author']) : '';
        $newsInfo->type = isset($news['type']) ? strip_tags($news['type']) : '';
        $newsInfo->isHot = isset($news['isHot']) ? $news['isHot'] : '';
        $newsInfo->content = isset($news['content']) ? $news['content'] : '';
        $newsInfo->time = time();
        $res = $newsInfo->save();
        return $res;
    }

    //设置热点新闻
    public function setHot($newsId){
        $newsId = intval($newsId);
        $newsInfo = $this->find($newsId);
        $newsInfo->isHot = '1';
        $res = $newsInfo->save();
        return $res;
    }

    //取消热点新闻
    public function outHot($newsId){
        $newsId = intval($newsId);
        $newsInfo = $this->find($newsId);
        $newsInfo->isHot = '0';
        $res = $newsInfo->save();
        return $res;
    }

    //删除
    public function realDelte($newsId){
        $newsId = intval($newsId);
        $res = $this->destroy($newsId);
        return $res;
    }

    //放入 垃圾箱新闻
    public function toRefuse($newsId){
        $newsId = intval($newsId);
        $newsInfo = $this->find($newsId);
        $newsInfo->delete = '1';
        $newsInfo->delTime = time();
        $res = $newsInfo->save();
        return $res;
    }

    //取消删除
    public function reList($newsId){
        $newsId = intval($newsId);
        $newsInfo = $this->find($newsId);
        $newsInfo->delete = '0';
        //$newsInfo->delTime = time();
        $res = $newsInfo->save();
        return $res;
    }


    /*
     * 一对多关系
     * 对应 comment (评论表)
     * */
    public function comments(){
        $comments = $this->hasMany('App\Models\Comment', 'news_id', 'id');
        //
        return $comments;
    }
    public function getComments(){
        $comList = $this->comments()->get();
        return $comList;
    }


    /**
     * 使用join 查询新闻  关联 评论
     */
    public function getNewsWithCom(){
        return $this->join('comments', 'news.id', '=' ,'comments.id')->get()->toArray();

    }


}

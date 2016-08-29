<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\URL;
use Request, Lang, Session;
use App\Models\News;
use App\Models\Comment;

class NewsController extends Controller{

    private $_News;
    private $_Username;
    public function __construct(){
        $this->_News = new News();
        if(session()->get('username')){
            $this->_Username = session()->get('username');
        }else{
            header("Location: ".URL('/login'));
            exit;
        }
    }

    //显示 添加新闻 页面
    public function addNews(){
        $adminName = $this->_Username;
        $newsId = Request::input('newsId') ? intval(Request::input('newsId')) : null;
        if($newsId == null){
            $newsInfo = [
                'id'=>'',
                'newsTitle'=>'',
                'author'=>'',
                'type'=>'',
                'isHot'=>'',
                'content'=>'',
                'time'=>'',
            ];
            return view('news/addNews')->with('newsInfo',$newsInfo)->with('adminName',$adminName);
        }
        $newsModel = $this->_News;
        $newsInfo = $newsModel->getNewsById($newsId);
        return view('news/addNews')->with('newsInfo',$newsInfo)->with('adminName',$adminName);
    }

    //显示新闻 列表
    public function index(){
        $newsType = Request::input('newsType') ? intval(Request::input('newsType')) : 9;
        $newsModel = $this->_News;
        $newsList = $newsModel->getAllNews($newsType);
        //dump($newsType);
        //dump($newsList);
        return view('news/index')->with('newsList', $newsList);
    }

    //显示垃圾箱
    public function refuseNews(){
        $newsModel = $this->_News;
        $newsList = $newsModel->refuseNews();
        //dump($newsList);
        return view('news/refuseNews')->with('newsList',$newsList);
    }
    //取消删除
    public function reList(){
        $newsId = Request::input('newsId') ? intval(Request::input('newsId')) : null;
        if($newsId == null){
            return back();
        }
        $newsModel = $this->_News;
        $newsList = $newsModel->reList($newsId);
        //dump($newsList);
        return redirect('/refuseNews');
    }

    //设置热点新闻
    public function setHot(){
        $newsId = Request::input('newsId') ? intval(Request::input('newsId')) : null;
        if($newsId == null){
            return back();
        }
        $newsModel = $this->_News;
        $res = $newsModel->setHot($newsId);
        if(!$res){
            return back();
        }else{
            return redirect('/newsList');
        }

    }
    //取消热点新闻
    public function outHot(){
        $newsId = Request::input('newsId') ? intval(Request::input('newsId')) : null;
        if($newsId == null){
            return back();
        }
        $newsModel = $this->_News;
        $res = $newsModel->outHot($newsId);
        if(!$res){
            return back();
        }else{
            return redirect('/newsList');
        }

    }

    //删除新闻
    public function toRefuse(){
        $newsId = Request::input('newsId') ? intval(Request::input('newsId')) : null;
        if($newsId == null){
            return back();
        }
        $newsModel = $this->_News;
        $res = $newsModel->toRefuse($newsId);
        if(!$res){
            return back();
        }else{
            return redirect('/newsList');
        }
    }



    //添加新闻操作
    public function createNews(){

        $title = Request::input('title') ? Request::input('title') : '';
        $author = Request::input('author') ? Request::input('author') : '';
        $type = Request::input('type') ? Request::input('type') : '';
        $isHot = Request::input('isHot') ? intval(Request::input('isHot')) : 0;
        $content = Request::input('content') ? Request::input('content') : '';

        $newsInfo = [
            'newsTitle' => $title,
            'author' => $author,
            'type' => $type,
            'isHot' => $isHot,
            'content' => $content,
        ];
        $newsModel = $this->_News;
        $res = $newsModel->addNews($newsInfo);
        if($res){
            return redirect('/newsList');
        }else{
            return back();
        }

    }

    //更新新闻
    public function updataNews(){
        $id = Request::input('id') ? Request::input('id') : '';
        $title = Request::input('title') ? Request::input('title') : '';
        $author = Request::input('author') ? Request::input('author') : '';
        $type = Request::input('type') ? Request::input('type') : '';
        $isHot = Request::input('isHot') ? intval(Request::input('isHot')) : 0;
        $content = Request::input('content') ? Request::input('content') : '';

        $newsInfo = [
            'id' => $id,
            'newsTitle' => $title,
            'author' => $author,
            'type' => $type,
            'isHot' => $isHot,
            'content' => $content,
        ];
        $newsModel = $this->_News;
        $res = $newsModel->updataNews($newsInfo);
        if($res){
            return redirect('/newsList');
        }else{
            return back();
        }
    }

    /*
     * 新闻详情页面
     *
     * */
    public function newsContent(){
        $id = Request::input('id') ? Request::input('id') : 2;
        $newsModel = $this->_News;
        $newsInfo = $newsModel->getNewsById($id);
        $comInfo = $newsModel->find($id)->getComments();    // 寻找此条新闻的评论
        count($comInfo) == 0 ? $has=0 : $has=1;         // 评论是否为空
        //dump($newsInfo);
        return view('news/newsContent')->with('newsInfo',$newsInfo)->with('comInfo',$comInfo)->with('has',$has);
    }

    /*
     * 关联查询的使用
     * 返回 某条新闻的所有评论
     * */

    public function getNewAllComms(){
        //$newsModel = $this->_News;
    }

    // 根据评论 寻找 新闻
    public function getOneNew(){
        //$oneNews =  (new Comment())->find(1)->news();
        //return $oneNews;
    }

    public function addComment(){
        $commentText = Request::input('comment')?Request::input('comment'):'';
        $newsId = Request::input('newsId')?Request::input('newsId'):'';

        $comInfo = ['user_id'=>'1','comment'=>$commentText,'time'=>time()];
        
        $comment = new Comment($comInfo);
        $news = $this->_News->find($newsId);

        $res = $news->comments()->save($comment);
        if(!$res){
            return back();
        }else{
            return redirect('/newsContent?id='.$newsId);
        }
    }

    public function getNewsWithCom(){
        $res = $this->_News->getNewsWithCom();
        dump($res);
    }




    //登出
    public function logout(){
        session()->forget('username');
        session()->forget('islogin');
        return redirect('/login');
    }


}

<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
      
      
      $this->display();
    }
    public function Repair(){
      $this->display('Repair:index');
    }
    public function user(){
      $this->display('User:index');
    }
}
<?php

namespace App\Http\Controllers\technican\reports;

use App\Http\Controllers\Controller;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class DashboardReportsController extends Controller
{
    public static function getOpenRequestsReport($id){
      $openRequests = \App\Models\Request::where('id_technik',$id)->where('status','in progress')->count();
      return $openRequests;
    }
    public static function getClosedRequestsReport($id){
        $date = strtotime('-30day');
        $closedRequests = \App\Models\Request::where('updated_at','>',$date)->where('status','closed')->where('id_technik',$id)->count();
        return $closedRequests;
    }
    public static function  getRequestsToTaken(){
        $toTaken = \App\Models\Request::where('status','new')->count();
        return  $toTaken;
    }
    public static function  getToDoList($id){
        $toDoList = ToDoList::where('technik_id',$id)->get();
        return  $toDoList;
    }
}

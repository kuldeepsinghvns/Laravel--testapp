<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//import class

use App\Bankdetails;
use App\shop;


use function Laravel\Prompts\error;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/hello', function (Request $request){
	try
	{
		
		$emp = [];
        $emp["msg"]="Hello " . $request["name"];
       
		if($emp==null)
		{
			throw new Exception('Id Not Found');
		}
		//$emp["url"]=str_replace("\\","",$emp["url"]);
		$emp["status"]="ok";
        

		return response()->json($emp, 200);
	}
	catch(\Exception $k) {
		$error=array("status"=>"failed","error"=>$k->getMessage());
		return response()->json($error, 200);
	}
});



Route::get('/marks',function (Request $request){
    try
    {
        $num=[];
        $num ["subject"]="physics";
        $num ["marks"]= $request["marks"];

        if ($num["marks"] >= 40) {
            $num["result"] = "pass";
        } else {
            $num["result"] = "fail";
        }


        if($num==null){
            throw new Exception("Not Found");
        }
        return response()->json($num,200);
    }
    catch(\Exception $ex){
        $error=array("status"=>"failed","error"=>$ex->getMessage());
        return response()->json($error,200);
    }
});




Route::get('/bankdetails', function(Request $request){
	try{
		
		$pi = Bankdetails::create($request->all());
		$pi->save();
		$pi["status"]="ok";
		
		
		return response()->json($pi, 200);
	}
	catch(\Exception $f){
		$error=array("status"=>"failed","error"=>$f->getMessage());
		return response()->json($error, 200);
	}
});


Route:: get('/shop',function(Request $request){
    try{
        $si = shop::create($request->all());
        $si -> save();
        $si["status"]="ok";
        return response()->json($si,200);
    }
    catch(\Exception $ex){
        $error=array("status"=>"failed","error"=>$ex->getMessage());
        return response()->json($error,200);
    }
});
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//import 
use App\employeedata;
use App\Bankdetails;
use App\shop;
use App\bankapp;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Arr;
use Mockery\Expectation;

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



Route::get('/hello', function (Request $request) {
	try {

		$emp = [];
		$emp["msg"] = "Hello " . $request["name"];

		if ($emp == null) {
			throw new Exception('Id Not Found');
		}
		//$emp["url"]=str_replace("\\","",$emp["url"]);
		$emp["status"] = "ok";


		return response()->json($emp, 200);
	} catch (\Exception $k) {
		$error = array("status" => "failed", "error" => $k->getMessage());
		return response()->json($error, 200);
	}
});



Route::get('/marks', function (Request $request) {
	try {
		$num = [];
		$num["subject"] = "physics";
		$num["marks"] = $request["marks"];

		if ($num["marks"] >= 40) {
			$num["result"] = "pass";
		} else {
			$num["result"] = "fail";
		}


		if ($num == null) {
			throw new Exception("Not Found");
		}
		return response()->json($num, 200);
	} catch (\Exception $ex) {
		$error = array("status" => "failed", "error" => $ex->getMessage());
		return response()->json($error, 200);
	}
});




Route::get('/bankdetails', function (Request $request) {
	try {

		$pi = Bankdetails::create($request->all());
		$pi->save();
		$pi["status"] = "ok";


		return response()->json($pi, 200);
	} catch (\Exception $f) {
		$error = array("status" => "failed", "error" => $f->getMessage());
		return response()->json($error, 200);
	}
});


Route::get('/shop', function (Request $request) {
	try {
		$si = shop::create($request->all());
		$si->save();
		$si["status"] = "ok";
		return response()->json($si, 200);
	} catch (\Exception $ex) {
		$error = array("status" => "failed", "error" => $ex->getMessage());
		return response()->json($error, 200);
	}
});



Route::get('/shopfind/{id}', function ($id, Request $request) {
	try {
		//$id=$request["id"];
		$emp = shop::find($id);
		if ($emp == null) {
			throw new Exception('Id Not Found');
		}
		//$emp["url"]=str_replace("\\","",$emp["url"]);
		$emp["status"] = "ok";

		return response()->json($emp, 200);
	} catch (\Exception $k) {
		$error = array("status" => "failed", "error" => $k->getMessage());
		return response()->json($error, 200);
	}
});




Route::get('/shopwhere/{name}', function ($name, Request $request) {
	try {
		//$id=$request["id"];
		$emp = shop::where('name', $name)->first();
		if ($emp == null) {
			throw new Exception('Id Not Found');
		}
		//$emp["url"]=str_replace("\\","",$emp["url"]);
		$emp["status"] = "ok";

		return response()->json($emp, 200);
	} catch (\Exception $k) {
		$error = array("status" => "failed", "error" => $k->getMessage());
		return response()->json($error, 200);
	}
});



// Route::get('/bank', function (Request $request) {
// 	try {
// 		$bk = bankapp::create($request->all());
// 		$bk->save();
// 		$bk['status'] = "ok";
// 		return response()->json($bk, 200);
// 	} catch (\Exception $ex) {
// 		$error = array("status" => "failed", "error" => $ex->getMessage());
// 		return response()->json($error, 200);
// 	}
// });



Route::get('/bankfind/{id}', function ($id, Request $request) {

	try {
		$bk = bankapp::find($id);
		if ($bk == null) {
			throw new Exception("number not found");
		}
		$bk["status"] = "ok";
		return response()->json($bk, 200);
	} catch (\Exception $ex) {
		$error = array("status" => "failed", "error" => $ex->getmessage());
		return response()->json($error, 200);
	}
});

Route::post('/bankdelete/{name}', function ($name, Request $request) {

	try {
		$bk = bankapp::find($name);

		if ($bk == null) {

			throw new Exception("Delete Successfull");
		}
		$bk->delete();
		$bk["status"] = "ok";
		return response()->json($bk, 200);
	} catch (\Exception $ex) {
		$error = array("status" => "failed", "error" => $ex->getmessage());

		return response()->json($error, 200);
	}
});


Route::get('/bankupdate/{id}', function ($id, Request $request) {

	try {
		$bk = bankapp::find($id);
		$bk->update($request->all());
		$bk->save();
		if ($bk == null) {
			throw new Exception("Id not found");
		}
		$bk["status"] = "ok";
		return response()->json($bk, 200);
	} catch (\Exception $ex) {
		$error = array("status" => "failed", "error" => $ex->getmessage());
		return response()->json($error, 200);
	}
});



Route::post('/bankpost', function (Request $request) {


	try {
		$bk = bankapp::create($request->all());
		$bk->save();
		$bk['status'] = "ok";
		return response()->json($bk, 200);
	} catch (\Exception $ex) {
		$error = array("status" => "failed", "error" => $ex->getMessage());
		return response()->json($error, 200);
	}
});

Route::post('/bankwhere', function (Request $request) {

	try {
		$name = $request["name"];
		// $bk=[];
		// $bk["name"]=$name;
		$bk = bankapp::where('name', $name)->first();
		if ($bk == null) {
			throw new Exception("name not found");
		}
		$bk["status"] = "ok";
		return response()->json($bk, 200);
	} catch (\Exception $ex) {
		$error = array("status" => "failed", "error" => $ex->getmessage());
		return response()->json($error, 200);
	}
});


Route::post('/bankupdate', function (Request $request) {

	try {
		$id = $request["id"];
		$bk = bankapp::find($id);
		// $bk["name"]="Aakash TakTakpur";
		$bk["name"] = $request["name"];
		$bk["banknumber"] = $request["banknumber"];
		$bk["balance"] = $request["balance"];
		// $bk->update($request->all());
		$bk->save();
		if ($bk == null) {
			throw new Exception("Id not found");
		}
		$bk["status"] = "ok";
		return response()->json($bk, 200);
	} catch (\Exception $ex) {
		$error = array("status" => "failed", "error" => $ex->getmessage());
		return response()->json($error, 200);
	}
});

Route::post('/bankdelete', function (Request $request) {

	try {
		$id = $request["id"];
		$bk = bankapp::find($id);
		$bk->delete();
		if ($bk == null) {

			throw new Exception("Delete Successfull");
		}

		$bk["status"] = "ok";
		return response()->json($bk, 200);
	} catch (\Exception $ex) {
		$error = array("status" => "failed", "error" => $ex->getmessage());

		return response()->json($error, 200);
	}
});


// Employee Data API


Route::get('/employee', function (Request $request) {
	try {
		$td = employeedata::create($request->all());
		$td->save();
		$td["status"] = "ok";
		return response()->json($td, 200);
	} catch (\Exception $ex) {
		$error = array("status" => "failed", "error" => $ex->getMessage());

		return response()->json($error, 200);
	}
});

Route::get('/employeewhere/{id}', function ($id, Request $request) {
	try {
		$id = $request['id'];
		$td = employeedata::where('id', $id)->first();
		if ($td == null) {
			throw new Exception("id not found");
		}
		$td["status"] = "ok";
		return response()->json($td, 200);
	} catch (\Exception $ex) {

		$error = array("status" => "failed", "error" => $ex->getMessage());

		return response()->json($error, 200);
	}
});

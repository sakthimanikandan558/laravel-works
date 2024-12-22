<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\Employee_details;
use App\Models\Emptab1;
use App\Models\Stu;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $employee1=Emptab1::find(1)->details;
    $employee1many=Emptab1::find(1)->detailsMany;
    $employee=Emptab1::with('details')->whereId(1)->get();
    $employee=Emptab1::with('details')->where('salary','>',80000)->get();
    $employeeOne=Emptab1::with('details')->where('salary','>',70000)->get();
    $employee=Emptab1::with('detailsMany')->where('salary','>',70000)->get();

    $empdetails=Employee_details::find(27)->empDetails;

    $stucourse=Stu::with('course')->whereId(2)->first();

    $studet=Course::with('students')->whereId(1)->get();

    //HasManyThrough
    $state=Country::find(2)->states;
    $cities=Country::find(2)->cities;
    $ctos=City::find(1)->state;
    $oneCity=Country::find(1)->city;
    // $ctoc=City::find(1)->country;




    return Response::json($oneCity);
});

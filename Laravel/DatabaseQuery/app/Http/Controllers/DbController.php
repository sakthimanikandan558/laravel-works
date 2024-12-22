<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;

use App\Models\DbModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\countOf;

class DbController extends Controller
{
    //
    public function showData(){
        $val=DbModel::oldest()->get();
        $val1=DbModel::where('salary',80000)->get('name');
        return $val1;
        $val12=DbModel::find(6);
        $val4=DbModel::pluck('name','dept');
        $val5=DbModel::orderby('salary')->chunk(5,function(Collection $users){
            // echo "hi";
            foreach($users as $user){
                
                // echo "<br>".$user;
            }
        });

        $val6=DbModel::count();
        $val7=DbModel::min('salary');
        $val8=DbModel::avg('salary');
        $val9=DbModel::where('name','Sakthi')->exists();
        $val10=DbModel::orderby('salary')->reorder('salary', 'desc')->get();
        $val10=DbModel::orderby('salary','desc')->get();

        // $val11=DbModel::groupby('dept')->get('dept',countof('name'));

        // $val11 = DbModel::select('dept', DbModel::raw('count(name) as count_of_names'))
    // ->groupBy('dept')
    // ->get();

    // $val11 = DB::select("SELECT * FROM emptab1");
    // dd($val11);
    $val11 = DbModel::select('dept', DBModel::raw('SUM(salary) as countName'))
    ->where('salary', '>', 10000)
    ->groupBy('dept')
    ->get();

    $val12 = DBModel::
                selectRaw('salary * ? as price_with_tax', [2])
                ->get();


    // $val12 = DBModel::
    // select('name', DB:: raw('salary * ? as price_with_tax', [2]))->get();

    // $count = 2;
    // $val12 = DBModel::select('name', DB::raw('(salary * $count) as price_with_tax'))->get();

    $val13=DbModel::distinct('dept')->get();
    $val14=DbModel::where('name','like','%s');
    $val15=DbModel::whereBetween('salary',[80000,90000])->get();
    $val16=DbModel::whereNotBetween('salary',[80000,90000])->get();
    $val17=DbModel::where('salary','>',80000)->get();
    $val18=DbModel::where('salary','>=',80000)->get();
    //wherein
    $val19=DbModel::whereIn('dept',['IT','HR'])->get();
    $val20=DbModel::whereNotIn('dept',['IT','HR'])->get();
    //null, notnull
    $val21=DbModel::whereNull('dept')->get();
    $val22=DbModel::whereNotNull('dept')->get();
    //whereDate
    // $val23=DbModel::whereDate('created_at','>=',date('Y-m
    // -d'))->get();
    //whereMonth
    $val24=DbModel::whereMonth('created_at',date('m'))->get();
    //whereYear
    $val25=DbModel::whereYear('created_at',date('Y'))->get();
    //whereTime
    $val26=DbModel::whereTime('created_at','>=',date('H:i:s'))->get();
    //whereDay
    $val27=DbModel::whereDay('created_at',date('d'))->get();

    //whereRaw
    $val28=DbModel::whereRaw('salary > 10000')->get();
    //whereExists
    $val29=DbModel::whereExists(function($query){
        $query->select(DB::raw(1))
        ->from('emptab1')
        ->whereRaw('emptab1.id = emptab2.id');
        })->get();

    //union
    $val30=DbModel::where('salary','>',80000)->union(DbModel::where('salary','>',90000))->get();

        $employees = DbModel
    ::join('employee_details', 'emptab1.id', '=', 'employee_details.employee_id')
    ->select(
        'emptab1.id',
        'emptab1.name',
        'emptab1.dept',
        'emptab1.position',
        'emptab1.salary',
        'employee_details.address',
        'employee_details.phone_number',
        'employee_details.email',
        'employee_details.birth_date'
    )
    ->get();

$employeesLeftJoin = DbModel
    ::leftJoin('employee_details', 'emptab1.id', '=', 'employee_details.employee_id')
    ->select(
        'emptab1.id',
        'emptab1.name',
        'emptab1.dept',
        'emptab1.position',
        'emptab1.salary',
        'employee_details.address',
        'employee_details.phone_number',
        'employee_details.email',
        'employee_details.birth_date'
    )
    ->get();

$employeesRightJoin = DbModel
    ::rightJoin('employee_details', 'emptab1.id', '=', 'employee_details.employee_id')
    ->select(
        'emptab1.id',
        'emptab1.name',
        'emptab1.dept',
        'emptab1.position',
        'emptab1.salary',
        'employee_details.address',
        'employee_details.phone_number',
        'employee_details.email',
        'employee_details.birth_date'
    )
    ->get();

$employeesCrossJoin = DbModel
    ::crossJoin('employee_details')
    ->select(
        'emptab1.id as emp_id',
        'emptab1.name as emp_name',
        'employee_details.id as details_id',
        'employee_details.address',
        'employee_details.phone_number',
        'employee_details.email',
        'employee_details.birth_date'
    )
    ->get();

    return $employeesCrossJoin;
    }
}

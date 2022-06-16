<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Models\EmployeeDetail;

class EmployeeController extends BaseController
{
    public $model_name = "App\Models\Employee";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Structural Design Patterns / Inheritance
        return parent::index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Structural Design Patterns / Inheritance
        return parent::store($request);
    }

    public function getDepartmentEmployee($department_id){  

        $employeeIds = EmployeeDetail::where('department_id', '=', $department_id)->pluck('employee_id');
        
        if (isset($employeeIds)) {
            //Structural Design Patterns / Inheritance
            $this->Query->whereIn('id', $company_id);
            return parent::index();
        }else{
            return $this->errorResponse("No Employee Found", 404);
        }
        
    }

    public function checkEmployeeInDepartment(Request $request){  
        $department_id = $request->department_id;

        $employeeIds = EmployeeDetail::where('department_id', '=', $department_id)->pluck('employee_id');
        
        if (isset($employeeIds)) {
             //Structural Design Patterns / Inheritance
             $this->Query->whereNotIn('id', $employeeIds);
             return parent::index();

        }else{
            //Structural Design Patterns / Inheritance
            return parent::index();
        }
        
    }

    public function createEmployeeDetails(Request $request){
        //   save into employe detail table
          $detail = new EmployeeDetail();
          $detail->employee_id = $request->employee_id;
          $detail->company_id = $request->company_id;
          $detail->department_id = $request->department_id;
          $detail->save();

          //   save into employe detail table
          $c_email = new Company_Employee();
          $c_email->employee_id = $request->employee_id;
          $c_email->company_id = $request->company_id;
          $c_email->save();

          //   save into department employee table
          $d_employee = new DepartmentEmployee();
          $d_employee->employee_id = $request->employee_id;
          $d_employee->department_id = $request->department_id;
          $d_employee->save();

          return $this->successResponse($detail, 200);
    }

   
}

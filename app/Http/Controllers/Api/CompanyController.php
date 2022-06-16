<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class CompanyController  extends BaseController
{
    public $model_name = "App\Models\Company";
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

    public function getCompanyDepartment($company_id)
    {  
        //Structural Design Patterns / Inheritance
        $this->Query->where('id', $company_id)->with(array('department'));

        return parent::index();
    }

    public function getCompanyEmployee($company_id)
    {
        //Structural Design Patterns / Inheritance
        $this->Query->where('id', $company_id)->with(array('employee'));

        return parent::index();
    }


}

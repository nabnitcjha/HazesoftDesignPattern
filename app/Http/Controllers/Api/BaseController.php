<?php

namespace App\Http\Controllers\Api;
use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    use ApiResponser;

    public function __construct() {
        if (!class_exists($this->model_name)) {
            return $this->errorResponse('Modal not found', 409);
        }
        // Implementing Creational Design Patterns
        $this->Model = new $this->model_name;

        //Structural Design Patterns
        $this->Query = $this->Model::select("*");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->showAll($this->Query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $params = $request->input("params"); 

        $Model = $this->getModel();
        foreach ($params as $key => $value) {
            $Model->$key = $value;
        }

       
        if (!$Model->save()) {
            return $this->errorResponse('Failed Store', 409);
        }

        return $this->successResponse($Model, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Model = $this->getModel();
        $Obj = $Model::find($id);
        if (!$Obj) { 
            return $this->errorResponse("Can not find {$id}", 404);
        }
        
        return $this->showOne($Obj, 200);
    }

    
}

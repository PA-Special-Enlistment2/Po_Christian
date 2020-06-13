<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $departments = Department::all();
        // $employees = Employee::all();

        // return view('forms.employeesform', compact('employees', 'departments'));
        $departments = Department::all();
        $datas = DB::table('employees')
                ->crossJoin('departments','departments.id','=', 'employees.dep_id')
                ->select('employees.id','employees.fname', 'employees.mname', 'employees.lname', 'employees.gender',
                        'employees.status', 'employees.position', 'employees.email', 'employees.contact', 'departments.name')
                ->get();
                return view('forms.employeesform',compact('datas', 'departments'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee;

        $employee->fname = $request->input('fname');
        $employee->mname = $request->input('mname');
        $employee->lname = $request->input('lname');
        $employee->gender = $request->input('gender');
        $employee->status = $request->input('status');
        $employee->position = $request->input('position');
        $employee->email = $request->input('email');
        $employee->contact = $request->input('contact');
        $employee->dep_id = $request->input('dep_id');

        $employee->save();

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        $employee->fname = $request->input('fname');
        $employee->mname = $request->input('mname');
        $employee->lname = $request->input('lname');
        $employee->gender = $request->input('gender');
        $employee->status = $request->input('status');
        $employee->position = $request->input('position');
        $employee->email = $request->input('email');
        $employee->contact = $request->input('contact');
        $employee->dep_id = $request->input('dep_id');

        $employee->save();
        return $employee;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return $employee;
    }

    public function qrgenerator($id){

        $emp = Employee::find($id);

        $data = DB::table('employees')
                ->crossJoin('departments', 'departments.id', '=', 'employees.dep_id')
                ->select('employees.fname', 'employees.mname', 'employees.lname', 'employees.gender',
                        'employees.status', 'employees.position', 'employees.email', 'employees.contact', 'departments.name')
                ->where('employees.id', $id)
                ->get();
        // $data->save();
        // $image = \QrCode::size(100)->generate($data);

            // $output_file = '/img/qr-code/img-' .time() . 'png';
            // \Storage::disk('local')->put($data, $image);
        // $dat = "hello";
        // $data = DB::table('employees')
        //         ->crossJoin('departments','departments.id','=', 'employees.dep_id')
        //         ->select('employees.id','employees.fname', 'employees.mname', 'employees.lname', 'employees.gender',
        //                 'employees.status', 'employees.position', 'employees.email', 'employees.contact', 'departments.name')
        //         ->where('employees.id', $id)
        //         ->get();

        // return view('forms.employeesform', compact('dat'));
        $str_json = json_encode($data);

        // echo $str_json;
        return view('employee.qrCode', compact('str_json', 'emp')); 

       
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employees;

class EmployeesController extends Controller
{
    public function getAllEmployees() {
        $employees = DB::table('employees')
        ->where('employees.is_delete','=',0)
        ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
        ->select('employees.*', 'positions.name as positionName', 'positions.code', 'positions.is_delete as positionDelete')
        ->get()->toJson(JSON_PRETTY_PRINT);
        return response($employees, 200);
      }
    
    public function getAllPositions() {
        $employees = DB::table('positions')->get()->toJson(JSON_PRETTY_PRINT);
        return response($employees, 200);
    }
    
    public function createEmployees(Request $request) {
        $employees = new Employees;
        $employees->name = $request->name;
        $employees->birth_date = $request->birth_date;
        $employees->position_id = $request->position_id;
        $employees->id_number = $request->id_number;
        $employees->gender = $request->gender;
        $employees->is_delete = 0;
        $employees->save();

        return response()->json([
            "message" => "Employee record created"
        ], 201);
    }

    public function getEmployee($id) {
        if (Employees::where('id', $id)->exists()) {
          $employee = Employees::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($employee, 200);
        } else {
          return response()->json([
            "message" => "Employee not found"
          ], 404);
        }
      }
  
    public function updateEmployees(Request $request, $id) {
        if (Employees::where('id', $id)->exists()) {
          $employees = Employees::find($id);
          $employees->name = $request->name;
          $employees->birth_date = $request->birth_date;
          $employees->position_id = $request->position_id;
          $employees->id_number = $request->id_number;
          $employees->gender = $request->gender;
          $employees->is_delete = 0;
          $employees->save();
  
          return response()->json([
            "message" => "records updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "Employees not found"
          ], 404);
        }
      }
  
    public function deleteEmployees(Request $request, $id) {
    if (Employees::where('id', $id)->exists()) {
        $employees = Employees::find($id);
        $employees->is_delete =  $request->is_delete;
        $employees->save();

        return response()->json([
        "message" => "records deleted successfully"
        ], 200);
    } else {
        return response()->json([
        "message" => "Employees not found"
        ], 404);
    }
    }
  
  }

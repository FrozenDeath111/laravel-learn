<?php

namespace App\Http\Controllers;

use App\Models\Reguser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReguserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $phone = $request->phone;
        $password = $request->password;

        if(empty($reguser = Reguser::where("phone", $phone)->first())){
            return response()->json([
                "error"=> "Not Found",
                "code" => 400,
            ]);
        }

        $reguser = Reguser::where("phone", $phone)->first();
        $password_check = $reguser['password'];

        if(!Hash::check($password, $password_check)){
            return response()->JSON([
                'error'=> 'Invalid Password',
                'code' => 400,
            ]);
        }

        return response()->JSON($reguser);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        // $validatedData = $request->validate([
        //     "username"=> ["required","min:5"],
        //     "email" => ["required","email"],
        //     "phone" => ["required","unique:regusers","regex:/^[+]880[0-9]+$/","max:14", "min:14"],
        //     "password" => ["required","min:8","regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/"],
        // ]);

        try {
            //code...
            $request->validate([
                "username"=> ["required","min:5"],
                "email" => ["required","email"],
                "phone" => ["required","unique:regusers","regex:/^[+]880[0-9]+$/","max:14", "min:14"],
                "password" => ["required","min:8","regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/"],
            ]);

            $reguser = new Reguser();
            $request['password'] = bcrypt($request->password);
            if($reguser->create($request->all())) {
                $jsondata = [
                    ["success" => "Database Entry Successful"],
                    ["code" => 200],
                ];

                return response()->JSON($jsondata);
            } else {
                $jsondata = [
                    ["error"=> "Database Entry Not Successful"],
                    ["code" => 400],
                ];

                return response()->JSON($jsondata);
            }
            
        } catch (\Throwable $th) {
            //throw $th;
            $jsondata = [
                ["error"=> "Invalid Entry"],
                ["code" => 400],
            ];

            return response()->JSON($jsondata);
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Reguser $reguser)
    {
        //
        $reguser = Reguser::all();
        return view("showusers", compact("reguser"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reguser $reguser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reguser $reguser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reguser $reguser)
    {
        //
    }
}

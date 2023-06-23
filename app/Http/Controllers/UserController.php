<?php

namespace App\Http\Controllers;
use App\Models\UserJob;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Traits\ApiResponser;

Class UserController extends Controller {
    use ApiResponser;

    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getUsers(){
        $users = User::all();
        return response()->json($users, 200);
    }
    public function index(){
        $users = User::all();
        return $this->successResponse($users);
    }
    
    public function add(Request $request ){
        
        $rules = [
            'AuthorID' => 'numeric|min:1|not_in:0',
            'AuthorName' => 'required|max:150',
            'Gender' => 'required|max:20',
            'Birthday' => 'required|date',
        ];
        
        $this->validate($request,$rules);
        $user = User::create($request->all());

        return $this->successResponse($user,Response::HTTP_CREATED);
    }

    public function show($AuthorID){

        $user = User::findOrFail($AuthorID);
        return $this->successResponse($user);
    }

    public function update(Request $request,$AuthorID){

        $rules = [
            'AuthorID' => 'required|numeric|min:1|not_in:0',
            'AuthorName' => 'required|max:150',
            'Gender' => 'required|max:20',
            'Birthday' => 'required|date',
        ];
    
        $this->validate($request, $rules);
        $user = User::findOrFail($AuthorID);
        $user->fill($request->all());
        
        if ($user->isClean()) {
            return $this->errorResponse('At least one value must
            change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $user->save();
        return $this->successResponse($user);
    }

    public function delete($AuthorID){
        
        $user = User::findOrFail($AuthorID);
        $user->delete();
        
        return $this->successResponse($user);
    }
}
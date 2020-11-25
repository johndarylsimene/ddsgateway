<?php
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
	use Illuminate\Http\Response;
    // use App\Models\User;
    use App\Services\User1Service;
    use App\Traits\ApiResponser;
    use DB;



Class User1Controller extends Controller {
    use ApiResponser;

    /**
    * The service to consume the User1 Microservice
    * @var User1Service
    */
    public $user1Service;
    /**
    * Create a new controller instance
    * @return void
     */
    public function __construct(User1Service$user1Service){
        $this->user1Service =$user1Service;
    }

    //SHOW ALL USERS IN THE DATABASE
    public function show(){
        return $this->successResponse($this->user1Service->obtainUsers1()); 
    }

    //ADDS USER IN THE DATABASE
    public function addUser(Request $request){
        return $this->successResponse($this->user1Service->createUser1($request->all(),Response::HTTP_CREATED));
     }

    //SHOW USER WITH THE INPUTED INDEX/USER ID
    public function index($id){
        return $this->successResponse($this->user1Service->obtainUser1($id));
    }

    //EDITS USER INFORMATION
    public function updateUser(Request $request, $id){
        return $this->successResponse($this->user1Service->editUser1($request->all(),$id));
    }

    //DELETES THE USER
    public function removeUser($id){
        return $this->successResponse($this->user1Service->deleteUser1($id));
    }

}


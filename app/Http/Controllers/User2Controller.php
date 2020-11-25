<?php
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
	use Illuminate\Http\Response;
    // use App\Models\User;
    use App\Traits\ApiResponser;
    use App\Services\User2Service;
    use DB;



Class User2Controller extends Controller {
    use ApiResponser;

    /**
    * The service to consume the User1 Microservice
    * @var User2Service
    */
    public $user2Service;
    /**
    * Create a new controller instance
    * @return void
     */
    public function __construct(User2Service$user2Service){
        $this->user2Service =$user2Service;
    }
    //SHOW ALL USERS IN THE DATABASE
    public function show(){
        return $this->successResponse($this->user2Service->obtainUsers2());
    }

    //ADDS USER IN THE DATABASE
    public function addUser(Request $request){
        return $this->successResponse($this->user2Service->createUser2($request->all(),Response::HTTP_CREATED));
     }

    //SHOW USER WITH THE INPUTED INDEX/USER ID
    public function index($id){
        return $this->successResponse($this->user2Service->obtainUser2($id));
    }

    //EDITS USER INFORMATION
    public function updateUser(Request $request, $id){
        return $this->successResponse($this->user2Service->editUser2($request->all(),$id));
    }

    //DELETES THE USER
    public function removeUser($id){
        return $this->successResponse($this->user2Service->deleteUser2($id));
    }
}


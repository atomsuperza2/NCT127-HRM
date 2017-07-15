<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\AccountInfo;
use App\DepartmentModel;
use App\DesignationModel;
use App\BankaccountModel;
use App\CutoffModel;
use Auth;
use App\AttendanceModel;
use App\Http\Controllers\Api\DaterangeController;
use Image;
use App\Authorizable;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use App\Permission;
use App\NationalityModel;


class AccountInfoController extends Controller
{
    // use Authorizable;
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $accounts = AccountInfo::paginate(15);
        $accounts = AccountInfo::paginate(10);
       return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $roles = Role::pluck('name', 'id');
          $designation = DesignationModel::pluck('designationName','id');
          $nationality = NationalityModel::pluck('nationality_name', 'id');
          $department = DepartmentModel::pluck('departmentName','id');
          return view('accounts.add', ['designation' => $designation, 'department' => $department, 'nationality' => $nationality], compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
          //  $data = ['birthday' => $request->birthday,
          //            'password' => $request->birthday];
        //  try{
        // if($user = USer::create($request->except(['roles', 'permissions'])))
          $user = User::create(['username' => $request -> username,
                                'password' => bcrypt(date('Ymd', strtotime($request -> birthday))),
                                // bcrypt($request -> birthday),
                                'name'=> $request -> name,
                                'email' => $request -> email,
                                'roles' => $request -> roles,
                                ]);

          $user->accountinfo = AccountInfo::create([
            'name' => $request -> name,
            'birthday' => $request -> birthday,
            'Gender' => $request -> Gender,
            'email' => $request -> email,
            'phone' => $request -> phone,
            'address' => $request -> address,
            'nationality_id' => $request -> nationality_id,
            // 'employeeID' => $request -> employeeID,
            'hiredDate' => $request -> hiredDate,
            'exitDate' => $request -> exitDate,
            'salary' => $request -> salary,
            'shiftStart' => $request -> shiftStart,
            'shiftEnd' => $request -> shiftEnd,
            'designation_id' => $request -> designation_id,
            'department_id' => $request -> department_id,
            'user_id' => $user->id,

          ]);
            $user->accountinfo->bankaccount = BankaccountModel::create([
            'user_id' => $user->accountinfo->id,
          ]);
          $this->syncPermissions($request, $user);

        //    flash('User has been created.');
        //
        //  } catch(Exception $e){
        //    flash()->error('Unable to create user.');
        //  }

        // if ( $user = User::create($request->except('roles', 'permissions')) ) {
        //     $this->syncPermissions($request, $user);
        //     flash('User has been created.');
        //     } else {
        //       flash()->error('Unable to create user.');
        //     }

          return redirect()->route('accounts.index');
    }

    public function update_avatar(Request $request, $id){

      if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));

        $user = AccountInfo::find($id);
        $user->avatar = $filename;
        $user->save();
      }
      return redirect("/accounts/$id/profile");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cutoff = CutoffModel::pluck('dateStart', 'id');
      $accounts = AccountInfo::find($id);
      return view('accounts.profile', ['cutoff' => $cutoff], compact('accounts'));
    }

    public function checkAttendance(Request $request, $id)
    {

      $accounts = AccountInfo::find($id);
      $cutoff = CutoffModel::find($request->cutoffId);
      // dd($cutoff);
      $ranges = DaterangeController::dateRange($cutoff->dateStart, $cutoff->dateEnd);

      return view('checkAttendance.check', ['cutoff' => $cutoff, 'ranges' => $ranges], compact('accounts'));
    }

    public function submitAttendance(Request $request, $id){
      $user_id = $request->user_id;
      $date = $request->date;
      $timeIn = $request->timeIn;
      $timeOut = $request->timeOut;

// dd($request->all());
       foreach ($request->date as $key => $date) {

          // echo $timeIn[$key];
          if (($timeIn[$key] !== null && $timeOut[$key] !== null) || ($timeIn[$key] !== null && $timeOut[$key] == null) || ($timeIn[$key] == null && $timeOut[$key] !== null)){
              // if ($request->a_id == null) {

                $attendance = new AttendanceModel();
                $attendance->user_id = $id;
                $attendance->date = $date;
                $attendance->timeIn = $timeIn[$key];
                $attendance->timeOut = $timeOut[$key];
                $attendance->save();
              }

              // if($request->a_id !== null){
              //   $attendance = AttendanceModel::find($request->a_id)->update([
              //     'user_id'=> $request -> user_id,
              //     'date' => $request -> date,
              //     'timeIn'=> $request -> timeIn,
              //     'timeOut' => $request -> timeOut,
              //   ]);
              //
              // }

          }

          return redirect("/accounts/$id/profile");

          // dd($attendance);
      }


      // return view('accounts.submitAttendance', ['result' => $request->all()]);

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $roles = Role::pluck('name', 'id');
      $permissions = Permission::all('name', 'id');
      $designation = DesignationModel::pluck('designationName','id');
      $department = DepartmentModel::pluck('departmentName','id');
      $nationality = NationalityModel::pluck('nationality_name', 'id');
      $accounts = AccountInfo::find($id);
      return view('accounts.edit', ['department' => $department, 'designation' => $designation, 'accounts' => $accounts, 'nationality' => $nationality], compact('roles', 'permissions'));
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
        $user = User::find($id);
        $user->username = $request -> username;

        $account = AccountInfo::find($id);

        $account->name = $request -> name;
        $account->birthday= $request -> birthday;
        $account->Gender = $request -> Gender;
        $account->email = $request -> email;
        $account->phone = $request -> phone;
        $account->address = $request -> address;
        $account->employeeID = $request -> employeeID;
        $account->nationality_id = $request -> nationality_id;
        $account->department_id = $request -> department_id;
        $account->designation_id = $request -> designation_id;
        $account->hiredDate = $request -> hiredDate;
        $account->exitDate = $request -> exitDate;
        $account->shiftStart = $request -> shiftStart;
        $account->shiftEnd = $request -> shiftEnd;
        $account->salary = $request -> salary;

        $this->syncPermissions($request, $user);
        $account->save();
        $user->save();
        session()->flash('message','Updated Successfully');
        return redirect('/accounts');
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = AccountInfo::find($id);
        $account->delete();
        session()->flash('message','Delete Successfully');
        return redirect('/accounts');
    }
    /**
     * Sync roles and permissions
     *
     * @param Request $request
     * @param $user
     * @return string
     */
    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);
        // Get the roles
        $roles = Role::find($roles);
        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }
        $user->syncRoles($roles);

        return $user;
    }
}

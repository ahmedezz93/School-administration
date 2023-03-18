<?php

namespace App\Http\Controllers;

use App\interface\students_accountsrepositoryinterface;
use Illuminate\Http\Request;

class StudentsAccountController extends Controller
{
    protected $students_accounts;

    public function __construct(students_accountsrepositoryinterface $students_accounts)
    {
        $this->students_accounts = $students_accounts;
    }

    public function index()
    {
        return $this->students_accounts->students_accounts();
    }

    public function edit($id)
    {
        return $this->students_accounts->edit_students_accounts($id);
    }

    public function update(Request $request)
    {
        return $this->students_accounts->update_students_accounts($request);
    }

    public function details($id)
    {
        return $this->students_accounts->details_accounts($id);
    }

    public function destroy(Request $request)
    {
        return $this->students_accounts->delete_accounts($request);
    }

    public function filter_account($id)
    {
        return $this->students_accounts->filter_account($id);
    }

    public function update_filter_account(Request $request)
    {
        return $this->students_accounts->update_filter_account($request);
    }


}

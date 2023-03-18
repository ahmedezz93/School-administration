<?php
namespace App\interface;
interface students_accountsrepositoryinterface{

    public function students_accounts();
    public function edit_students_accounts($id);
    public function update_students_accounts($request);
    public function details_accounts($id);
    public function delete_accounts($request);
    public function filter_account($id);
    public function update_filter_account($request);


}

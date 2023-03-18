<?php

namespace App\Http\Livewire;
use App\Models\blood;
use App\Models\gender;
use App\Models\nationalitie;
use App\Models\parent_attachment;
use App\Models\religion;
use App\Models\the_parent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class TheParents extends Component
{
    use WithFileUploads;


    public $currentStep=1,$show_table=true,$update_mode=false;

    //----------------father--------
    public $email,$Password,$Name_Father,$photos,$disk,
    $Name_Father_en,$Job_Father,$Job_Father_en,
    $National_ID_Father,$Passport_ID_Father,$Phone_Father,
    $Nationality_Father_id,$Blood_Type_Father_id,
    $Religion_Father_id,$Address_Father,$parent_id,

    //--------------------mother------------------------

    $Name_Mother,$Name_Mother_en,$National_ID_Mother,$Passport_ID_Mother,$Phone_Mother,
    $Job_Mother,$Job_Mother_en,$Nationality_Mother_id,$Blood_Type_Mother_id,$Religion_Mother_id,
       $Address_Mother;


    public function render()
    {

        return view('livewire.the-parents',[

            "nationalities"=>nationalitie::all(),
            "bloods"=>blood::all(),
            "religions"=>religion::all(),
            "the_parents"=>the_parent::all(),
        ]);
    }


public function secondstepsubmit(){
//-------------------father validate-----------------
    $this->validate([
        "National_ID_Father"=>'required|string|min:10|max:10|regex:/[0-9]{9}/',
        "email"=>'required|email|unique:the_parents,email',
        "Password"=>"required",
        "Name_Father"=>"required",
        "Job_Father"=>"required",
        "Job_Father_en"=>"required",
        "Name_Father_en"=>"required",
        "National_ID_Father"=>"required",
        "Passport_ID_Father"=>"required",
        "Phone_Father"=> 'required|min:10',
        "Nationality_Father_id"=>"required",
        "Blood_Type_Father_id"=>"required",
        "Religion_Father_id"=>"required",
        "Address_Father"=>"required",
    ]);

    $this->currentStep=2;
}

public function thirdstepsubmit(){
    $this->validate([
        "Name_Mother"=>"required",
        "Name_Mother_en"=>"required",
        "Job_Mother"=>"required",
        "Job_Mother_en"=>"required",
        "National_ID_Mother"=>"required",
        "Passport_ID_Mother"=>"required",
        "Phone_Mother"=> 'required|min:10',
        "Nationality_Mother_id"=>"required",
        "Blood_Type_Mother_id"=>"required",
        "Religion_Mother_id"=>"required",
        "Address_Mother"=>"required",
    ]);

    $this->currentStep=3;
}

public function submitForm(){

    DB::beginTransaction();

    try{

        $theparents= new the_parent();

        //--------------------------------------father information---------------

        $theparents->email =$this->email;

        $theparents->password=Hash::make($this->Password);

        $theparents->name_Father=["ar"=>$this->Name_Father,"en"=>$this->Name_Father_en];

        $theparents->national_id_Father=$this->National_ID_Father;

        $theparents->passport_id_Father=$this->Passport_ID_Father;

        $theparents->phone_father=$this->Phone_Father;

        $theparents->job_father=["ar"=>$this->Job_Father,"en"=>$this->Job_Father_en];

        $theparents->nationality_father_id=$this->Nationality_Father_id;

        $theparents->blood_type_father_id=$this->Blood_Type_Father_id;

        $theparents->religion_father_id=$this->Religion_Father_id;

        $theparents->address_father=$this->Address_Father;

        //--------------------------------------mother information---------------
        $theparents->name_mother=["ar"=>$this->Name_Mother,"en"=>$this->Name_Mother_en];

        $theparents->national_id_mother=$this->National_ID_Mother;

        $theparents->passport_id_mother=$this->Passport_ID_Mother;

        $theparents->phone_mother=$this->Phone_Mother;

        $theparents->job_mother=["ar"=>$this->Job_Mother,"en"=>$this->Job_Mother_en];

        $theparents->nationality_Mother_id=$this->Nationality_Mother_id;

        $theparents->blood_type_mother_id=$this->Blood_Type_Mother_id;

        $theparents->religion_mother_id=$this->Religion_Mother_id;

        $theparents->address_Mother=$this->Address_Mother;
        $theparents->save();

        if(!empty($this->photos)){

         foreach($this->photos as $photo){

           $name=$photo->getclientoriginalname();

           $photo->storeAs("/".$this->Phone_Father,$name,'upload_files');

          parent_attachment::create([

            "file_name"=>$photo->getclientoriginalname(),
            "parent_id"=>the_parent::latest()->first()->id,

          ]);

         }
        }
        DB::commit();

    flash()->addsuccess(trans('messages.save_message'));
    return redirect()->route('add_parent');


    }
    catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }


}

public function back($number){

    $this->currentStep=$number;
}



public function showformadd(){


    $this->show_table=false;

}


public function edit($id){

$this->show_table = false;
$this->update_mode = true;
$My_Parent = the_parent::where('id',$id)->first();
$this->parent_id = $id;
$this->email = $My_Parent->email;
$this->Password = $My_Parent->password;
$this->Name_Father = $My_Parent->getTranslation('name_Father', 'ar');
$this->Name_Father_en = $My_Parent->getTranslation('name_Father', 'en');
$this->Job_Father = $My_Parent->getTranslation('job_father', 'ar');;
$this->Job_Father_en = $My_Parent->getTranslation('job_father', 'en');
$this->National_ID_Father =$My_Parent->national_id_Father;
$this->Passport_ID_Father = $My_Parent->passport_id_Father;
$this->Phone_Father = $My_Parent->phone_father;
$this->Nationality_Father_id = $My_Parent->nationality_father_id;
$this->Blood_Type_Father_id = $My_Parent->blood_type_father_id;
$this->Religion_Father_id =$My_Parent->religion_father_id;
$this->Address_Father =$My_Parent->address_father;

$this->Name_Mother = $My_Parent->getTranslation('name_mother', 'ar');
$this->Name_Mother_en = $My_Parent->getTranslation('name_mother', 'en');
$this->Job_Mother = $My_Parent->getTranslation('job_mother', 'ar');;
$this->Job_Mother_en = $My_Parent->getTranslation('job_mother', 'en');
$this->National_ID_Mother =$My_Parent->national_id_mother;
$this->Passport_ID_Mother = $My_Parent->passport_id_mother;
$this->Phone_Mother = $My_Parent->phone_mother;
$this->Nationality_Mother_id = $My_Parent->nationality_Mother_id;
$this->Blood_Type_Mother_id = $My_Parent->blood_type_mother_id;
$this->Religion_Mother_id =$My_Parent->address_Mother;
$this->Address_Mother =$My_Parent->religion_mother_id;

}
public function secondstepsubmit_edit(){
    $this->update_mode = true;
$this->currentStep=2;

}
public function thirdstepsubmit_edit(){
    $this->update_mode = true;
$this->currentStep=3;

}


public function submitForm_update(){
    $id=$this->parent_id;
    the_parent::where('id',$id)->update([

        "email" =>$this->email,

       "password"=>Hash::make($this->Password),

       "name_Father"=>["ar"=>$this->Name_Father,"en"=>$this->Name_Father_en],

        "national_id_Father"=>$this->National_ID_Father,

        "passport_id_Father"=>$this->Passport_ID_Father,

        "phone_father"=>$this->Phone_Father,

      "job_father"=>["ar"=>$this->Job_Father,"en"=>$this->Job_Father_en],

        "nationality_father_id"=>$this->Nationality_Father_id,

        "blood_type_father_id"=>$this->Blood_Type_Father_id,

        "religion_father_id"=>$this->Religion_Father_id,

       "address_father"=>$this->Address_Father,

        //--------------------------------------mother information---------------
        "name_mother"=>["ar"=>$this->Name_Mother,"en"=>$this->Name_Mother_en],

        "national_id_mother"=>$this->National_ID_Mother,

        "passport_id_mother"=>$this->Passport_ID_Mother,

        "phone_mother"=>$this->Phone_Mother,

       "job_mother"=>["ar"=>$this->Job_Mother,"en"=>$this->Job_Mother_en],

        "nationality_Mother_id"=>$this->Nationality_Mother_id,

      "blood_type_mother_id"=>$this->Blood_Type_Mother_id,

       "religion_mother_id"=>$this->Religion_Mother_id,

       "address_Mother"=>$this->Address_Mother,

    ]);
flash()->addsuccess(trans('messages.update_message'));
return back();
}


public function delete($id){

      $parent=the_parent::find($id);
        $folder_name=$parent->phone_father;
if(File::exists(public_path('assets/images/'.$folder_name))){

    File::deleteDirectory(public_path('assets/images/'.$folder_name));

}
    the_parent::where('id',$id)->delete();
    flash()->adderror(trans('messages.delete_message'));
     return back();

}

}

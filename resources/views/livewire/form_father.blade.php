@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">الايميل</label>
                        <input type="email" wire:model="email"  class="form-control">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" wire:model="parent_id" >

                    <div class="col">
                        <label for="title">الباسورد</label>
                        <input type="password" wire:model="Password" class="form-control" >
                        @error('Password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="title">اسم الاب بالعربي</label>
                        <input type="text" wire:model="Name_Father" class="form-control" >
                        @error('Name_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">اسم الاب بالانجليزية</label>
                        <input type="text" wire:model="Name_Father_en" class="form-control" >
                        @error('Name_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="title">وظيفه الاب بالعربية</label>
                        <input type="text" wire:model="Job_Father" class="form-control">
                        @error('Job_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="title">وظيفة الاب بالانجليزية</label>
                        <input type="text" wire:model="Job_Father_en" class="form-control">
                        @error('Job_Father_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">الرقم القومى</label>
                        <input type="text" wire:model="National_ID_Father" class="form-control">
                        @error('National_ID_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">رقم جواز السفر</label>
                        <input type="text" wire:model="Passport_ID_Father" class="form-control">
                        @error('Passport_ID_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="title">رقم تليفون الوالد</label>
                        <input type="text" wire:model="Phone_Father" class="form-control">
                        @error('Phone_Father')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">جنسية الوالد</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Father_id">
                            <option selected disabled>حدد جنسية الوالد...</option>
                            @foreach ($nationalities as $national )
                              <option value="{{ $national->id }}">{{ $national->name }}</option>
                            @endforeach
                        </select>
                        @error('Nationality_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">نوع فصيلة الدم</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Father_id">
                            <option selected>حدد نوع فصيلة الدم...</option>
                            @foreach ($bloods as $blood )
                            <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                          @endforeach

                        </select>
                        @error('Blood_Type_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">ديانة الوالد</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Father_id">
                            <option selected>حدد نوع ديانة الوالد...</option>
                            @foreach ($religions as $religion )
                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                          @endforeach

                        </select>
                        @error('Religion_Father_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">عنوان الوالد</label>
                    <textarea class="form-control" wire:model="Address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('Address_Father')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                @if ($update_mode)
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondstepsubmit_edit"
                type="button">التالى
        </button>

                 @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondstepsubmit"
                            type="button">التالى
                    </button>
                    @endif


            </div>
        </div>
    </div>

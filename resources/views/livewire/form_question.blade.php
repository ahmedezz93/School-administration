
            @if ($currentStep != 3)
           <div style="display: none" class="row setup-content" id="step-3">
               @endif

               <div class="col-xs-12">
                   <div class="col-md-12"><br>
                       <label style="color: red">المرفقات</label>
                       <div class="form-group">
                           <input type="file" wire:model="photos" accept="image/*" multiple>
                       </div>
                       <br>
                       <input type="hidden" wire:model="parent_id">

                               @if($update_mode)

                               <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                               wire:click="secondstepsubmit_edit">السابق</button>

                           <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm_update"
                                   type="button">تأكيد</button>
                               @else

                               <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                               wire:click="back(2)">السابق</button>

                           <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                                   type="button">تأكيد</button>

                               @endif
                   </div>
               </div>
           </div>



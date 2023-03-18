<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('the_parents.add parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('the_parents.E-mail') }}</th>
            <th>{{ trans('the_parents.Fathers name in Arabic') }}</th>
            <th>{{ trans('the_parents.ID Number') }}</th>
            <th>{{ trans('the_parents.Passport number') }}</th>
            <th>{{ trans('the_parents.phone number') }}</th>
            <th>{{ trans('the_parents.Job name') }}</th>
            <th>{{ trans('grades.processes') }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($the_parents as $the_parent )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{  $the_parent->name_Father }}</td>

                <td>{{ $the_parent->email }}</td>
                <td>{{ $the_parent->national_id_Father }}</td>
                <td>{{ $the_parent->passport_id_Father }}</td>
                <td>{{ $the_parent->phone_father }}</td>
                <td>{{ $the_parent->job_father }}</td>
                <td>
                    <a class="btn ripple btn-primary" wire:click="edit({{$the_parent->id}})"  >{{ trans('buttons.edit') }}</a>
                    <a class="btn ripple btn-danger" wire:click="delete({{$the_parent->id}})" >{{ trans('buttons.delete') }}</a>

                </td>
            </tr>

            @endforeach
    </table>
</div>

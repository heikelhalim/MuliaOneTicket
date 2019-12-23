    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    {!! CollectiveForm::open([
            'method' => 'PATCH',
            'route' => [
                         $setting->grab('admin_route').'.agent.update',
                         $agent->id
                       ],
        ]) !!}

    <div class="modal-content">

        <div class="modal-header">
        <h5 class="modal-title" id="ticket-edit-modal-Label">List Of Outlets</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">{{ trans('ticketit::lang.flash-x') }}</span></button>
        </div>

        <div class="modal-body">
            <div class="form-group">

            @foreach(App\User::where('ticketit_outlet',true)->get() as $agent_outlet)
            <div class="form-check form-check-inline">
                                <input name="agent_outlets[]"
                                    type="checkbox"
                                    class="form-check-input"
                                    value="{{ $agent_outlet->id }}"
                                    {!! ($agent_outlet->tagents()->where("id", $agent->id)->count() > 0) ? "checked" : ""  !!}
                                    > 
                                <label class="form-check-label" for="inlineCheckbox1">{{ $agent_outlet->name }}</label>
            </div>
 
            @endforeach
            </div>
        </div>

        <div class="modal-footer">
            {!! CollectiveForm::submit(trans('ticketit::admin.btn-join'), ['class' => 'btn btn-info btn-sm']) !!}
        </div>

    </div>
    {!! CollectiveForm::close() !!}
    </div>


<div class="modal fade" id="ticket-editresponse-modal" tabindex="-1" role="dialog" aria-labelledby="ticket-edit-modal-Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    {!! CollectiveForm::model($ticket, [
                 'route' => [$setting->grab('main_route').'.update', $ticket->id],
                 'method' => 'PATCH',
                 'class' => 'form-horizontal'
             ]) !!}
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="ticket-edit-modal-Label">{{ $ticket->subject }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">{{ trans('ticketit::lang.flash-x') }}</span></button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    {!! CollectiveForm::hidden('updateflag', 'response') !!}
                    {!! CollectiveForm::label('action', trans('ticketit::lang.action') . trans('ticketit::lang.colon'), ['class' => '']) !!}
                    {!! CollectiveForm::select('action_id', $actions, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! CollectiveForm::label('technical_remarks', trans('ticketit::lang.technical_remarks') . trans('ticketit::lang.colon'), ['class' => '']) !!}             
                    {!! CollectiveForm::textarea('technical_remarks',null, ['class' => 'form-control', 'rows' => '5', 'required' => 'required'])  !!}                </div>

                <div class="form-group">
                    {!! CollectiveForm::label('in_progress_picture_remarks', trans('ticketit::lang.in_progress_picture_remarks') . trans('ticketit::lang.colon'), ['class' => '']) !!}             
                    <textarea class="form-control summernote-editor" rows="5" required name="in_progress" cols="50">{!! htmlspecialchars($ticket->in_progress_html) !!}</textarea>
                </div>

                <div class="form-group">
                    {!! CollectiveForm::label('after_picture_remarks', trans('ticketit::lang.after_picture_remarks') . trans('ticketit::lang.colon'), ['class' => '']) !!}             
                    <textarea class="form-control summernote-editor" rows="5" required name="after" cols="50">{!! htmlspecialchars($ticket->after_remarks_html) !!}</textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('ticketit::lang.btn-close') }}</button>
                {!! CollectiveForm::submit(trans('ticketit::lang.btn-submit'), ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! CollectiveForm::close() !!} 
    </div>
</div>


<p><strong><i>Section 2 : Technical Response</i></strong></p>
<div class="card mb-3">
    <div class="card-body row">
        <div class="col-md-6">
            <p>
                <strong>{{ trans('ticketit::lang.action') }}</strong>{{ trans('ticketit::lang.colon') }}
                {{ $ticket->action->name }}
            </p>
            <p>
                <strong>{{ trans('ticketit::lang.technical_remarks') }}</strong>{{ trans('ticketit::lang.colon') }}
                <span style="color: {{ $ticket->priority->color }}">
                    {{ $ticket->technical_remarks }}
                </span>
            </p>

            <p>
                <strong>{{ trans('ticketit::lang.in_progress_picture_remarks') }}</strong>{{ trans('ticketit::lang.colon') }}
            </p>
            <div class="gambar">
                {!! $ticket->in_progress_html !!}
            </div>



        </div>
        <div class="col-md-6">
            <p> <strong>{{ trans('ticketit::lang.assigned_technician') }}</strong>{{ trans('ticketit::lang.colon') }}
                {{ $ticket->agent_id == $u->id ? $u->name : $ticket->agent->name }}
            </p>

<p>
<br>
</p>

            <p>
                <strong>{{ trans('ticketit::lang.after_picture_remarks') }}</strong>{{ trans('ticketit::lang.colon') }}
            </p>
            <div class="gambar">
                {!! $ticket->after_remarks_html !!}
            </div>


        </div>
    </div>
</div>

@if($u->isAgent() || $u->isAdmin())

    @if( !$ticket->completed_at )
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ticket-editresponse-modal">
                {{ trans('ticketit::lang.btn-edit')  }}
    </button>
    @endif
    
@endif

<script>
    $('#ticket-editresponse-modal').modal('handleUpdate')
</script>

{!! CollectiveForm::open([
                'method' => 'DELETE',
                'route' => [
                            $setting->grab('main_route').'.destroy',
                            $ticket->id
                            ],
                'id' => "delete-ticket-$ticket->id"
                ])
!!}
{!! CollectiveForm::close() !!}


@if($u->isAgent() || $u->isAdmin())
    @include('ticketit::tickets.editresponse')
@endif

{{-- // OR; Modal Window: 2/2 --}}
@if($u->isAdmin())
    @include('ticketit::tickets.partials.modal-delete-confirm')
@endif
{{-- // END Modal Window: 2/2 --}}

<br>

<div class="text-center">
<font size="6"><strong> Maintenance Complaint Form </strong></font>
<img src="{{ asset('/muliaonelogo.jpg') }}"  width="100" height="100" >
</div>

<br>

<div class="card-body row">
        <div class="col-md-6">
           <p><strong>{{ trans('ticketit::lang.outlet_id') }}</strong>{{ trans('ticketit::lang.colon') }}{{ $ticket->user_id == $u->id ? $u->name : $ticket->user->name }}</p>
           <br>
           <p> <strong>Reported Date</strong>{{ trans('ticketit::lang.colon') }}{{ $ticket->created_at->format('d/m/Y') }}</p>
           <p> <strong>Reported Time</strong>{{ trans('ticketit::lang.colon') }}{{ $ticket->created_at->format('h:i:s A') }}</p>


        </div>
        <div class="col-md-6">
            <p> <strong>{{ trans('ticketit::lang.report_no') }}</strong>{{ trans('ticketit::lang.colon') }}
               <!-- {{ $ticket->agent_id == $u->id ? $u->name : $ticket->agent->name }} -->
                {{ $ticket->report_no }}
            </p>
            <br>
            @if( $ticket->completed_at )
            <p> <strong>{{ trans('ticketit::lang.completed-date') }}</strong>{{ trans('ticketit::lang.colon') }}{{ $ticket->completed_at->format('d/m/Y') }}</p>
            <p> <strong>{{ trans('ticketit::lang.completed-time') }}</strong>{{ trans('ticketit::lang.colon') }}{{ $ticket->completed_at->format('h:i:s A') }}</p>
            @endif

        
        </div>
</div>

<p><strong><i>Section 1 : Report</i></strong></p>
<div class="card mb-3">
    <div class="card-body row">
        <div class="col-md-6">
            <p><strong>Subject</strong>{{ trans('ticketit::lang.colon') }}{{ $ticket->subject}}</p>
            <p><strong>{{ trans('ticketit::lang.complaint_by') }}</strong>{{ trans('ticketit::lang.colon') }}{{ $ticket->complaint_by }}</p>
            <p><strong>{{ trans('ticketit::lang.position') }}</strong>{{ trans('ticketit::lang.colon') }}{{ $ticket->position }}</p>

            <p>
                <strong>{{ trans('ticketit::lang.priority') }}</strong>{{ trans('ticketit::lang.colon') }}
                <span style="color: {{ $ticket->priority->color }}">
                    {{ $ticket->priority->name }}
                </span>
            </p>

            <p>
                <strong>{{ trans('ticketit::lang.report_details') }}</strong>{{ trans('ticketit::lang.colon') }}
                <br>{!! $ticket->report_details !!}
            </p>

            <p>
            <strong>{{ trans('ticketit::lang.picture_and_remarks') }}</strong>{{ trans('ticketit::lang.colon') }}
            </p>
            <p>
                {!! $ticket->html !!}
            </p>


        </div>
        <div class="col-md-6">
            <p>
                <strong>{{ trans('ticketit::lang.status') }}</strong>{{ trans('ticketit::lang.colon') }}
                @if( $ticket->isComplete() && ! $setting->grab('default_close_status_id') )
                    <span style="color: blue"><strong>Resolved</strong></span>
                @else
                    <span style="color: {{ $ticket->status->color }}"><strong>{{ $ticket->status->name }}</strong></span>
                @endif

            </p>
            <p>
                <strong>{{ trans('ticketit::lang.category') }}</strong>{{ trans('ticketit::lang.colon') }}
                <span style="color: {{ $ticket->category->color }}">
                    {{ $ticket->category->name }} 
                  
                </span>
            </p>
            <p>
                <strong>{{ 'Subcategory' }}</strong>{{ trans('ticketit::lang.colon') }}
                    {{ $ticket->subcategory->name }} 
            </p>
        </div>
    </div>
</div>



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

{{--
@if($u->isAgent() || $u->isAdmin())
    @include('ticketit::tickets.edit')
@endif

--}}

{{-- // OR; Modal Window: 2/2 --}}
@if($u->isAdmin())
    @include('ticketit::tickets.partials.modal-delete-confirm')
@endif
{{-- // END Modal Window: 2/2 --}}

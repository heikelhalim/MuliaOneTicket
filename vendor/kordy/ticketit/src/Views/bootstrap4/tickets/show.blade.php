@extends('ticketit::layouts.master')
@section('page', trans('ticketit::lang.show-ticket-title') . trans('ticketit::lang.colon') . $ticket->subject)
@section('page_title', 'Subject : '.$ticket->subject)

@section('ticketit_header')
<div>
    @if($ticket->completed_at)
        <button type="button" onclick="window.print();" class="btn btn-info">
         Print
        </button>

    @endif

    @if(! $ticket->completed_at && $close_perm == 'yes')
    {{-- Hide Reopen Ticket Button

    @elseif($ticket->completed_at && $reopen_perm == 'yes')
            {!! link_to_route($setting->grab('main_route').'.reopen', trans('ticketit::lang.reopen-ticket'), $ticket->id,
                                ['class' => 'btn btn-success']) !!}
    --}}                                    
    @endif

    @if($u->isAgent() || $u->isAdmin())
    {{-- Hide Reopen Edit Button
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ticket-edit-modal">
            {{ trans('ticketit::lang.btn-edit')  }}
        </button>
    --}}
    @endif

</div>
@stop

@section('ticketit_content')

    @include('ticketit::tickets.partials.ticket_body')

    @if($ticket->status->name == 'Pending Verification' || $ticket->status->name == 'Resolved')

        @include('ticketit::tickets.partials.ticket_response')

        @if( $u->isAgent() == false )
  
             @if( !$ticket->completed_at )
                <p><strong>Section 3 : Completion Verification</strong></p>
                {!! link_to_route($setting->grab('main_route').'.complete', trans('ticketit::lang.btn-mark-complete'), $ticket->id,
                                    ['class' => 'btn btn-success']) !!}
            @endif

        @endif
    
    @elseif($ticket->status->name == 'New' && $u->isAgent())
        
       <p><strong>Section 2 : Technical Response</strong></p>
       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ticket-editresponse-modal">
            {{ trans('ticketit::lang.btn-technician-form')  }}
        </button>
        @include('ticketit::tickets.editresponse')            
    @endif


@endsection


@section('ticketit_extra_content')
    <h2 class="mt-5">{{ trans('ticketit::lang.comments') }}</h2>
    @include('ticketit::tickets.partials.comments')
    {{-- pagination --}}
    {!! $comments->render("pagination::bootstrap-4") !!}
    @include('ticketit::tickets.partials.comment_form')
@stop

@section('footer')
    <script>
        $(document).ready(function() {
            $( ".deleteit" ).click(function( event ) {
                event.preventDefault();
                if (confirm("{!! trans('ticketit::lang.show-ticket-js-delete') !!}" + $(this).attr("node") + " ?"))
                {
                    var form = $(this).attr("form");
                    $("#" + form).submit();
                }

            });
            $('#category_id').change(function(){
                var loadpage = "{!! route($setting->grab('main_route').'agentselectlist') !!}/" + $(this).val() + "/{{ $ticket->id }}";
                $('#agent_id').load(loadpage);
            });
            $('#confirmDelete').on('show.bs.modal', function (e) {
                $message = $(e.relatedTarget).attr('data-message');
                $(this).find('.modal-body p').text($message);
                $title = $(e.relatedTarget).attr('data-title');
                $(this).find('.modal-title').text($title);

                // Pass form reference to modal for submission on yes/ok
                var form = $(e.relatedTarget).closest('form');
                $(this).find('.modal-footer #confirm').data('form', form);
            });

            <!-- Form confirm (yes/ok) handler, submits form -->
            $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
                $(this).data('form').submit();
            });
        });
    </script>
    @include('ticketit::tickets.partials.summernote')
@append

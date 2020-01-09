@extends('ticketit::layouts.master')

@section('page', trans('ticketit::admin.agent-index-title'))

@section('ticketit_header')
<!--
{!! link_to_route(
    $setting->grab('admin_route').'.agent.create',
    trans('ticketit::admin.btn-create-new-agent'), null,
    ['class' => 'btn btn-primary'])
!!}
-->
@stop

@section('ticketit_content_parent_class', 'p-0')

@section('ticketit_content')
    @if ($agents->isEmpty())
        <h3 class="text-center">{{ trans('ticketit::admin.agent-index-no-agents') }}
            {!! link_to_route($setting->grab('admin_route').'.agent.create', trans('ticketit::admin.agent-index-create-new')) !!}
        </h3>
    @else
        <div id="message"></div>
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>{{ trans('ticketit::admin.table-id') }}</th>
                    <th>{{ trans('ticketit::admin.table-name') }}</th>
                    <th>Outlets</th>
                    <th>Join Outlets</th>
                   <!-- <th>{{ trans('ticketit::admin.table-remove-agent') }}</th> -->
                </tr>
            </thead>
            <tbody>
            @foreach($agents as $agent)
                <tr>
                    <td>
                        {{ $agent->id }}
                    </td>
                    <td>
                        {{ $agent->name }}
                    </td>
                    <td>
                        @foreach($agent->outlets as $outlet)
                                {{  $outlet->name }}
                        @endforeach
                    </td>
                    <td>
                    
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target=
                        "#ticket-listoutlet-modal{{ $loop->iteration }}">
                        Select Outlets
                        </button>

                        <div class="modal fade" id="ticket-listoutlet-modal{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="ticket-edit-modal-Label" aria-hidden="true">
                        @include('ticketit::.admin.agent.listoutlets')            
                        </div>
                    </td>
                  <!--  <td>
                        {!! CollectiveForm::open([
                        'method' => 'DELETE',
                        'route' => [
                                    $setting->grab('admin_route').'.agent.destroy',
                                    $agent->id
                                    ],
                        'id' => "delete-$agent->id"
                        ]) !!}
                        {!! CollectiveForm::submit(trans('ticketit::admin.btn-remove'), ['class' => 'btn btn-danger']) !!}
                        {!! CollectiveForm::close() !!}
                    </td> -->
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
@stop

@extends('ticketit::layouts.master')

@section('page', trans('ticketit::admin.user-index-title'))

@section('ticketit_header')
{!! link_to_route(
    $setting->grab('admin_route').'.user.create',
    trans('ticketit::admin.btn-create-new-user'), null,
    ['class' => 'btn btn-primary'])
!!}
@stop

@section('ticketit_content_parent_class', 'p-0')

@section('ticketit_content')
    @if ($users->isEmpty())
        <h3 class="text-center">{{ trans('ticketit::admin.status-index-no-statuses') }}
            {!! link_to_route($setting->grab('admin_route').'.status.create', trans('ticketit::admin.status-index-create-new')) !!}
        </h3>
    @else
        <div id="message"></div>
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>{{ trans('ticketit::admin.table-id') }}</th>
                    <th>{{ trans('ticketit::admin.table-name') }}</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>{{ trans('ticketit::admin.table-action') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td style="vertical-align: middle">
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{$user->isAgent()}}
                        @if( $user->roleTechnicalPersonal())
                            Technical Personal
                        @elseif( $user->roleManager())
                            Manager
                        @elseif( $user->roleAdmin())
                            Admin
                        @elseif( $user->roleOutlet())
                            Outlet
                        @endif                        
                    </td>
                    <td>
                        {!! link_to_route(
                                                $setting->grab('admin_route').'.user.edit', trans('ticketit::admin.btn-edit'), $user->id,
                                                ['class' => 'btn btn-info'] )
                            !!}

                            {{--
                            
                            {!! link_to_route(
                                                $setting->grab('admin_route').'.user.destroy', trans('ticketit::admin.btn-delete'), $user->id,
                                                [
                                                'class' => 'btn btn-danger deleteit',
                                                'form' => "delete-$user->id",
                                                "node" => $user->name
                                                ])
                            !!}
                        {!! CollectiveForm::open([
                                        'method' => 'DELETE',
                                        'route' => [
                                                    $setting->grab('admin_route').'.user.destroy',
                                                    $user->id
                                                    ],
                                        'id' => "delete-$user->id"
                                        ])
                        !!}
                        {!! CollectiveForm::close() !!}

                        --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@stop

@section('footer')
    <script>
        $( ".deleteit" ).click(function( event ) {
            event.preventDefault();
            if (confirm("{!! trans('ticketit::admin.status-index-js-delete') !!}" + $(this).attr("node") + " ?"))
            {
                $form = $(this).attr("form");
                $("#" + $form).submit();
            }

        });
    </script>
@append

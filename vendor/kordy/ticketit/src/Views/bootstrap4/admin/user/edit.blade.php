@extends('ticketit::layouts.master')
@section('page', trans('ticketit::admin.user-edit-title', ['name' => ucwords($user->name)]))

@section('ticketit_content') 
    {!! CollectiveForm::model($user, [
                                    'route' => [$setting->grab('admin_route').'.user.update', $user->id],
                                    'method' => 'PATCH'
                                    ]) !!}
        @include('ticketit::admin.user.editform', ['update', true])
    {!! CollectiveForm::close() !!}
@stop

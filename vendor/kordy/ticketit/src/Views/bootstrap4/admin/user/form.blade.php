<div class="form-group">
    {!! CollectiveForm::label('name', trans('ticketit::admin.user-create-name') . trans('ticketit::admin.colon'), ['class' => '']) !!}
    {!! CollectiveForm::text('name', isset($user->name) ? $user->name : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! CollectiveForm::label('email', trans('ticketit::admin.user-create-email') . trans('ticketit::admin.colon'), ['class' => '']) !!}
    {!! CollectiveForm::text('email', isset($user->email) ? $user->email : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! CollectiveForm::label('type', trans('ticketit::admin.user-create-type') . trans('ticketit::admin.colon'), ['class' => '']) !!} <br>
    <label for="type" class="">Agent  </label>
    {!! CollectiveForm::radio('type', '1', ['class' => 'form-control']) !!}
    <label for="type" class="">Outlet  </label>
    {!! CollectiveForm::radio('type', '2', ['class' => 'form-control']) !!}
    <label for="type" class="">Manager  </label>
    {!! CollectiveForm::radio('type', '3', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! CollectiveForm::label('password', trans('ticketit::admin.user-create-password') . trans('ticketit::admin.colon'), ['class' => '']) !!}<br>
    {!! CollectiveForm::password('password', isset($user->password) ? $user->password : null, ['class' => 'form-control']) !!}
</div>


{!! link_to_route($setting->grab('admin_route').'.status.index', trans('ticketit::admin.btn-back'), null, ['class' => 'btn btn-link']) !!}
@if(isset($status))
    {!! CollectiveForm::submit(trans('ticketit::admin.btn-update'), ['class' => 'btn btn-primary']) !!}
@else
    {!! CollectiveForm::submit(trans('ticketit::admin.btn-submit'), ['class' => 'btn btn-primary']) !!}
@endif

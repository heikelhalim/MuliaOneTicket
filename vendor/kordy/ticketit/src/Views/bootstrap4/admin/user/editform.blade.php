<div class="form-group">
    {!! CollectiveForm::label('name', trans('ticketit::admin.user-create-name') . trans('ticketit::admin.colon'), ['class' => '']) !!}
    {{ $user->name }}
</div>

<div class="form-group">
    {!! CollectiveForm::label('email', trans('ticketit::admin.user-create-email') . trans('ticketit::admin.colon'), ['class' => '']) !!}
    {{ $user->email }}
</div>

<div class="form-group">
    {!! CollectiveForm::label('contact_no', 'Contact No. ' . trans('ticketit::admin.colon'), ['class' => '']) !!}
    {!! CollectiveForm::text('contact_no', isset($user->contact_no) ? $user->contact_no : null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! CollectiveForm::label('address','Address' . trans('ticketit::admin.colon'), ['class' => '']) !!}
    {!! CollectiveForm::textarea('address', isset($user->address) ? $user->address : null, ['class' => 'form-control','rows' => 5]) !!}
</div>

<div class="form-group">
    {!! CollectiveForm::label('password', 'New Password' . trans('ticketit::admin.colon'), ['class' => '']) !!}
    {!! CollectiveForm::password('password', array('size'=>25, 'maxlength'=>20) , ['class' => 'form-control'] ) !!}
</div>



{!! link_to_route($setting->grab('admin_route').'.user.index', trans('ticketit::admin.btn-back'), null, ['class' => 'btn btn-link']) !!}
@if(isset($status))
    {!! CollectiveForm::submit(trans('ticketit::admin.btn-update'), ['class' => 'btn btn-primary']) !!}
@else
    {!! CollectiveForm::submit(trans('ticketit::admin.btn-submit'), ['class' => 'btn btn-primary']) !!}
@endif

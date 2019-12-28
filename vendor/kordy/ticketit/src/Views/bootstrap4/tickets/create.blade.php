@extends('ticketit::layouts.master')
@section('page', trans('ticketit::lang.create-ticket-title'))
@section('page_title', trans('ticketit::lang.create-new-ticket'))

@section('ticketit_content')
    {!! CollectiveForm::open([
                    'route'=>$setting->grab('main_route').'.store',
                    'method' => 'POST'
                    ]) !!}
        <div class="form-group row">
            {!! CollectiveForm::label('subject', trans('ticketit::lang.subject') . trans('ticketit::lang.colon'), ['class' => 'col-lg-2 col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::text('subject', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="form-text text-muted">{!! trans('ticketit::lang.create-ticket-brief-issue') !!}</small>
            </div>
        </div>

        <div class="form-group row">
            {!! CollectiveForm::label('complaint_by', trans('ticketit::lang.complaint_by') . trans('ticketit::lang.colon'), ['class' => 'col-lg-2 col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::text('complaint_by', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="form-text text-muted">{!! trans('ticketit::lang.create-ticket-complaint-by') !!}</small>
            </div>
        </div>

        <div class="form-group row">
            {!! CollectiveForm::label('position', trans('ticketit::lang.position') . trans('ticketit::lang.colon'), ['class' => 'col-lg-2 col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::text('position', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="form-text text-muted">{!! trans('ticketit::lang.create-ticket-position') !!}</small>
            </div>
        </div>


        <div class="form-group row">
            {!! CollectiveForm::label('report_details', trans('ticketit::lang.report_details') . trans('ticketit::lang.colon'), ['class' => 'col-lg-2 col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::textarea('report_details',null, ['class' => 'form-control', 'rows' => '5', 'required' => 'required'])  !!}
                <small class="form-text text-muted">{!! trans('ticketit::lang.create-ticket-describe-issue') !!}</small>
            </div>
        </div>
        <div class="form-group row">
            {!! CollectiveForm::label('content', trans('ticketit::lang.picture_and_remarks') . trans('ticketit::lang.colon'), ['class' => 'col-lg-2 col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::textarea('content', null, ['class' => 'form-control summernote-editor', 'rows' => '5', 'required' => 'required']) !!}
                <small class="form-text text-muted">{!! trans('ticketit::lang.create-ticket-picture_remarks') !!}</small>
            </div>
        </div>
        <div class="form-row mt-5">
            <div class="form-group col-lg-4 row">
                {!! CollectiveForm::label('priority', trans('ticketit::lang.priority') . trans('ticketit::lang.colon'), ['class' => 'col-lg-6 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! CollectiveForm::select('priority_id', $priorities, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-row mt-5">
            <div class="form-group col-lg-4 row">
                {!! CollectiveForm::label('category', trans('ticketit::lang.category') . trans('ticketit::lang.colon'), ['class' => 'col-lg-6 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! CollectiveForm::select('category_id', $categories, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="form-group offset-lg-1 col-lg-4 row">
                {!! CollectiveForm::label('subcategory', 'SubCategory' . trans('ticketit::lang.colon'), ['class' => 'col-lg-6 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! CollectiveForm::select('subcategory_id', $subcategories, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            {!! CollectiveForm::hidden('agent_id', 'auto') !!}
        </div>

        <br>
        <div class="form-group row">
            <div class="col-lg-10 offset-lg-2">
                {!! link_to_route($setting->grab('main_route').'.index', trans('ticketit::lang.btn-back'), null, ['class' => 'btn btn-link']) !!}
                {!! CollectiveForm::submit(trans('ticketit::lang.btn-submit'), ['class' => 'btn btn-primary']) !!}
            </div>
        </div>


    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
                jQuery('select[name="category_id"]').on('change',function(){

                var countryID = jQuery(this).val();

                if(countryID)
                {
                    jQuery.ajax({
                        url : 'dropdownlist/subcategory/' +countryID,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            console.log(data);
                            jQuery('select[name="subcategory_id"]').empty();
                            jQuery.each(data, function(key,value){
                            $('select[name="subcategory_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }
                else
                {
                    $('select[name="subcategory_id"]').empty();
                }
                });
        });
    </script>
    {!! CollectiveForm::close() !!}
@endsection

@section('footer')
    @include('ticketit::tickets.partials.summernote')
@append
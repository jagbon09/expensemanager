<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', trans('labels.backend.expenses.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.expenses.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div class="form-group">
        {{ Form::label('description', trans('labels.backend.expenses.description'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10 mce-box">
            {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('labels.backend.expenses.description')]) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div class="form-group">
        {{ Form::label('date', trans('validation.attributes.backend.expenses.date'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            @if(!empty($expenses->date))
                {{ Form::text('date', \Carbon\Carbon::parse($expenses->date)->format('m/d/Y h:i a'), ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.expenses.date'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @else
                {{ Form::text('date', null, ['class' => 'form-control datetimepicker1 box-size', 'placeholder' => trans('validation.attributes.backend.expenses.date'), 'required' => 'required', 'id' => 'datetimepicker1']) }}
            @endif
        </div><!--col-lg-10-->
    </div><!--form control-->
    <div class="form-group">
        {{ Form::label('amount', trans('labels.backend.expenses.amount'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::number('amount', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.expenses.amount'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
    </div><!--form-group-->
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">

        Backend.Blog.init('{{ config('locale.languages.' . app()->getLocale())[1] }}');
        
    </script>
@endsection
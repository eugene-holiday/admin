<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }}</label>
	<div class="datepicker form-group input-group">
		<input data-date-format="{{ $pickerFormat }}" data-date-pickdate="false" data-date-useseconds="{{ $seconds ? 'true' : 'false' }}" class="form-control" name="{{ $name }}" type="text" id="{{ $name }}" value="{{ $value }}" @if(isset($readonly))readonly="{{ $readonly }}"@endif>
		<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
	</div>
	@include('admin::admin.fields.errors')
</div>
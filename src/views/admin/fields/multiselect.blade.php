<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }} @if($required) *@endif </label>
	<p><small style="color: grey;"> {{ $description }}</small></p>
	<div>
		<select id="{{ $name }}" name="{{ $name }}[]" class="form-control multiselect" multiple="multiple">
			@foreach ($options as $optionValue => $optionLabel)
				<option value="{{ $optionValue }}" {!! isset($value) && in_array($optionValue, $value) ? 'selected="selected"' : '' !!}>{{ $optionLabel }}</option>
			@endforeach
		</select>
	</div>
	@include('admin::admin.fields.errors'))
</div>
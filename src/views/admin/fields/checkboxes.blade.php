<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }} @if($required) *@endif</label>
	<p><small style="color: grey;"> {{ $description }}</small></p>
	<input type="hidden" name="{{ $name}}[]" value="" checked="checked" />
	@foreach ($options as $optionValue => $optionLabel)
		<div class="checkbox">
			<label>
				<input type="checkbox" name="{{ $name }}[]" value="{{ $optionValue }}" {!! isset($value) && in_array($optionValue, $value) ? 'checked="checked"' : '' !!} />{{ $optionLabel }}
			</label>
		</div>
	@endforeach
	@include('admin::admin.fields.errors')
</div>
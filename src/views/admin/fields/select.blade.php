<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }} @if($required) *@endif</label>
	<p><small style="color: grey;"> {{ $description }}</small></p>
	<div>
		<select id="{{ $name }}" name="{{ $name }}" class="form-control multiselect" size="2" data-select-type="single" {!! ($nullable) ? 'data-nullable="true"' : '' !!}>
			@if ($nullable)
				<option value=""></option>
			@endif
			@foreach ($options as $optionValue => $optionLabel)
				<option value="{{ $optionValue }}" {!! ($value == $optionValue) ? 'selected="selected"' : '' !!}>{{ $optionLabel }}</option>
			@endforeach
		</select>
	</div>
</div>
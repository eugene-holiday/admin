<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }} @if($required) *@endif</label>
	<p><small style="color: grey;"> {{ $description }}</small></p>
	@if ($nullable)
		<div class="radio">
			<label>
				<input type="radio" name="{{ $name }}" value="" {!! ($value == null) ? 'checked' : '' !!}/>
				{{ trans('admin::lang.select.nothing') }}
			</label>
		</div>
	@endif
	@foreach ($options as $optionValue => $optionLabel)
		<div class="radio">
			<label>
				<input type="radio" name="{{ $name }}" value="{{ $optionValue }}" {!! ($value == $optionValue) ? 'checked' : '' !!}/>
				{{ $optionLabel }}
			</label>
		</div>
	@endforeach
</div>
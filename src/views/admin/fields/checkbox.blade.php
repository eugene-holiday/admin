<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<div class="checkbox">
		<label>
			<input type="hidden" name="{{ $name }}" value="" checked="checked" />
			<input type="checkbox" name="{{ $name }}" value="1" {!! $value ? 'checked="checked"' : '' !!} />{{ $label }} @if($required) *@endif
		</label>
		<p><small style="color: grey;"> {{ $description }}</small></p>
	</div>
</div>
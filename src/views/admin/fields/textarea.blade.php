<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }} @if($required) *@endif</label>
	<p><small style="color: grey;"> {{ $description }}</small></p>
	<textarea class="form-control" rows="{{ $rows }}" name="{{ $name }}" placeholder="{{ $placeholder }}" @if(isset($readonly))readonly="{{ $readonly }}"@endif>{!! $value !!}</textarea>
	@include('admin::admin.fields.errors')
</div>
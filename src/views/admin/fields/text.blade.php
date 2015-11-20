<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }} @if(isset($required)) *@endif </label>
	@if(isset($description))<p><small style="color: grey;"> {{ $description }}</small></p>@endif
	<input class="form-control" name="{{ $name }}" type="text" id="{{ $name }}" @if(isset($placeholder)) placeholder="{{ $placeholder  }}" @endif value="{{ $value }}" @if(isset($readonly))readonly="{{ $readonly }}" @endif>
	@include('admin::admin.fields.errors')
</div>
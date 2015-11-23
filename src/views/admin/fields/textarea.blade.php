<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }} @if($required) *@endif</label>
	<p><small style="color: grey;"> {{ $description }}</small></p>
	<textarea class="form-control" name="{{ $name }}" @if(isset($placeholder)) placeholder="{{ $placeholder  }}" @endif @if(isset($readonly))readonly="{{ $readonly }}"@endif>{!! $value !!}</textarea>
</div>
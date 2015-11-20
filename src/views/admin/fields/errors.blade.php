@if ($errors->has())
	<div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
		Не удалось сохранить продукт
		@foreach ($errors as $error)
			<p>{{ $error }}</p>
		@endforeach
	</div>
@endif



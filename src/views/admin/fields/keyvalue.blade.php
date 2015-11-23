<div class="keyvalue form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label>{{ $label }}</label>
	<p><small style="color: grey;"> {{ $description }}</small></p>
	<div class="panel panel-default">
		<div class="panel-body">

			<input v-model="values" type="hidden" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}"/>
			<div class="col-sm-8 col-lg-4 col-xs-12">
				<div class="item row">
					<div class="col-sm-5">
						<input class="key form-control" v-model="key" type="text" placeholder="Ключ" value="" />
					</div>
					<div class="col-sm-5">
						<input class="value form-control" v-model="value" type="text" placeholder="Значение" value="" v-on:keyup.enter="addItem" />
					</div>
					<div class="col-sm-2">
						<button class="btn btn-default" v-on:click="addItem"><i class="fa fa-plus"></i></button>
					</div>
				</div>

				<div class="item row" v-for="item in items">
					<div class="col-sm-5 ">
						<input class="form-control" name="{{$name}}[@{{ $index }}][key]" type="text" value="@{{ item.key }}" />
					</div>
					<div class="col-sm-5">
						<input class="form-control" name="{{$name}}[@{{ $index }}][value]" type="text" value="@{{ item.value }}" />
					</div>
					<div class="col-sm-2">
						<button class="btn btn-default" v-on:click="removeItem($index)"><i class="fa fa-minus"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
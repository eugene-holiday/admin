

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Блогозапись</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{ url('admin/posts/1/update', ['id' => 1]) }}" method="POST">
        <input name="_method" type="hidden" value="PUT">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="box-body">
            @if($entity->formFields())
                @foreach($entity->formFields() as $field)
                    @include('admin::admin.fields.'. $field['type'], $field)
                @endforeach
            @endif
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div><!-- /.box -->




<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Quick Example</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{ route('admin.users.update', $user) }}" method="POST">
        <input name="_method" type="hidden" value="PUT">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="box-body">
            @include('admin::admin.fields.text', ['name' => 'email', 'label' => 'Email address', 'value' => $user->email ])

            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Check me out
                </label>
            </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div><!-- /.box -->


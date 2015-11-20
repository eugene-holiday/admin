

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Quick Example</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{ route('admin.users.update') }}">
        <div class="box-body">

            @include('admin::admin.fields.text', ['name' => 'email', 'label' => 'Email address', 'value' => $user->email])

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" {{ $user->password }}>
            </div>
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


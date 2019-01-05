{{ Form::open(['route' => ['store-contact']]) }}
    <div class="card shadow">
        <div class="card-body">
            <h3 class="text-center">Contact us</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required">
                        {{ Form::label('name', 'Your name:', ['class' => 'control-label']) }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required">
                        {{ Form::label('email', 'Your email:', ['class' => 'control-label']) }}
                        {{ Form::text('email', null, ['class' => 'form-control', 'required' => true]) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group required">
                        {{ Form::label('message', 'Message:', ['class' => 'control-label']) }}
                        {{ Form::textarea('message', null, ['class' => 'form-control', 'required' => true, 'rows' => 4]) }}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    {{ Form::submit('Create', ['class' => 'btn btn-primary btn-block']) }}
                </div>
            </div>
        </div>
    </div>
{{ Form::close() }}
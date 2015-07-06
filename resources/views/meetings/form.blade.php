<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title for this meeting']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Meeting description']) !!}
</div>

<div class="form-group">
    {!! Form::label('welcomeText', 'Welcome text:') !!}
    {!! Form::text('welcomeText', null, ['class' => 'form-control', 'placeholder' => 'Welcome text']) !!}
</div>

<div class="form-group">
    {!! Form::label('moderatorPassword', 'Moderator password:') !!}
    {!! Form::password('moderatorPassword', null, ['class' => 'form-control', 'placeholder' => 'moderator']) !!}
</div>

<div class="form-group">
    {!! Form::label('attendeePassword', 'Attendee password:') !!}
    {!! Form::password('attendeePassword', null, ['class' => 'form-control', 'placeholder' => 'attendee']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>
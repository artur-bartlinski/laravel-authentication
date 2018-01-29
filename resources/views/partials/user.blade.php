<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail Address *</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('title_id') ? ' has-error' : '' }}">
    <label for="title_id" class="col-md-4 control-label">Title</label>

    <div class="col-md-6">
        <select id="title_id" class="form-control" name="title_id" value="{{ old('title_id') }}">
            @if($titles)
                @foreach($titles as $title)
                    <option value="{{ $title->id }}">{{ $title->name }}</option>
                @endforeach
            @endif
            <option value="" selected></option>
        </select>

        @if ($errors->has('title_id'))
            <span class="help-block">
                <strong>{{ $errors->first('title_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('forename') ? ' has-error' : '' }}">
    <label for="forename" class="col-md-4 control-label">Forename</label>

    <div class="col-md-6">
        <input id="forename" type="text" class="form-control" name="forename" value="{{ old('forename') }}">

        @if ($errors->has('forename'))
            <span class="help-block">
                <strong>{{ $errors->first('forename') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
    <label for="surname" class="col-md-4 control-label">Surname</label>

    <div class="col-md-6">
        <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}">

        @if ($errors->has('surname'))
            <span class="help-block">
                <strong>{{ $errors->first('surname') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
    <label for="dob" class="col-md-4 control-label">Date Of Birth *</label>

    <div class="col-md-6">
        <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required>

        @if ($errors->has('dob'))
            <span class="help-block">
                <strong>{{ $errors->first('dob') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">
    <label for="gender_id" class="col-md-4 control-label">Gender</label>

    <div class="col-md-6">
        <select id="gender_id" class="form-control" name="gender_id" value="{{ old('gender_id') }}">
            @if($genders)
                @foreach($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                @endforeach
            @endif
            <option value="" selected></option>
        </select>

        @if ($errors->has('gender_id'))
            <span class="help-block">
                <strong>{{ $errors->first('gender_id') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('address_line_1') ? ' has-error' : '' }}">
    <label for="address_line_1" class="col-md-4 control-label">Address Line 1 *</label>

    <div class="col-md-6">
        <input id="address_line_1" type="text" class="form-control" name="address_line_1" value="{{ $address['address_line_1'] or old('address_line_1') }}" required>

        @if ($errors->has('address_line_1'))
            <span class="help-block">
                <strong>{{ $errors->first('address_line_1') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address_line_2') ? ' has-error' : '' }}">
    <label for="address_line_2" class="col-md-4 control-label">Address Line 2</label>

    <div class="col-md-6">
        <input id="address_line_2" type="text" class="form-control" name="address_line_2" value="{{  $address['address_line_2'] or old('address_line_2') }}">

        @if ($errors->has('address_line_2'))
            <span class="help-block">
                <strong>{{ $errors->first('address_line_2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
    <label for="town" class="col-md-4 control-label">Town *</label>

    <div class="col-md-6">
        <input id="town" type="text" class="form-control" name="town" value="{{ $address['town'] or old('town') }}" required>

        @if ($errors->has('town'))
            <span class="help-block">
                <strong>{{ $errors->first('town') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
    <label for="county" class="col-md-4 control-label">County</label>

    <div class="col-md-6">
        <input id="county" type="text" class="form-control" name="county" value="{{ $address['county'] or old('county' ) }}">

        @if ($errors->has('county'))
            <span class="help-block">
                <strong>{{ $errors->first('county') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
    <label for="country" class="col-md-4 control-label">Country *</label>

    <div class="col-md-6">
        <input id="country" type="text" class="form-control" name="country" value="{{ $address['country'] or old('country') }}" required>

        @if ($errors->has('country'))
            <span class="help-block">
                <strong>{{ $errors->first('country') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
    <label for="postal_code" class="col-md-4 control-label">Postal code *</label>

    <div class="col-md-6">
        <input id="postal_code" type="text" class="form-control" name="postal_code" value="{{ $address['postal_code'] or old('postal_code' ) }}" required>

        @if ($errors->has('postal_code'))
            <span class="help-block">
                <strong>{{ $errors->first('postal_code') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('from_date') ? ' has-error' : '' }}">
    <label for="from_date" class="col-md-4 control-label">From Date *</label>

    <div class="col-md-6">
        <input id="from_date" type="date" class="form-control" name="from_date" value="{{ $address['from_date'] or old('from_date' ) }}" required>

        @if ($errors->has('from_date'))
            <span class="help-block">
                <strong>{{ $errors->first('from_date') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('until_date') ? ' has-error' : '' }}">
    <label for="until_date" class="col-md-4 control-label">Until Date *</label>

    <div class="col-md-6">
        <input id="until_date" type="date" class="form-control" name="until_date" value="{{ $address['until_date'] or old('until_date') }}" required>

        @if ($errors->has('until_date'))
            <span class="help-block">
                <strong>{{ $errors->first('until_date') }}</strong>
            </span>
        @endif
    </div>
</div>

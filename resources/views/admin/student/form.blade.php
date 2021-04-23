@csrf

<div class="">
    {{-- {{ "data-image=\"".asset("images/avatar/".$user->avatar)."\"" }}
    {{asset('storage/images/avatars/'. $user->avatar) }}"
    --}}
    <div class="avatar-upload text-center mb-3" {{isset($company)? "data-image=\"".asset('storage/images/companyLogo/'. $company->image)."\"":"" }}>
        <img class="avatar-preview" id="output" src="{{isset($company)?asset('storage/images/companyLogo/'. $company->image):""}}">
    </div>
    <div class=" row text-center justify-content-center">
        <div class="col-xl-8">
            <div class="form-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" onchange="loadFile(event)" name="company_logo" value="{{ old('company_logo') }}">
                    <label class="custom-file-label" for="customFile" id="labelIMG">Upload Company Logo</label>
                </div>
                @error('company_logo')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>
{{-- <div class="form-group">
    <div class="text-center filePondContainer">
        <input type="file" class="filepond" id="company_logo" name="fileUpload">
    </div>

    <div class="input-group">
        @if ($errors->first('company_logo'))
        <span class="text-danger">
            {{ $errors->first('company_logo') }}
</span>
@endif
</div>
</div> --}}

<div class="form-group">
    <label for="name">Company Name</label>
    <input type="text" name="company_name" id="company_name" class="form-control" value="{{ isset($company)?$company->company_name : old('company_name') }}">
    @if ($errors->first('company_name'))
    <span class="text-danger">
        {{ $errors->first('company_name') }}
    </span>
    @endif
</div>

<div class="form-group">
    <label for="name">Company Field</label>
    <input type="text" name="company_field" id="company_field" class="form-control" value="{{ isset($company)?$company->company_field : old('company_field') }}">
    @if ($errors->first('company_field'))
    <span class="text-danger">
        {{ $errors->first('company_field') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="desc">Company Description</label>
    <textarea name="desc" id="desc" cols="30" rows="4" class="form-control">
    {{ isset($company)?$company->company_desc : old('desc') }}
    </textarea>
    @if ($errors->first('desc'))
    <span class="text-danger">
        {{ $errors->first('desc') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="name">Company Phone Number</label>
    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ isset($company)? $company->phone_number : old('phone_number') }}">
    @if ($errors->first('phone_number'))
    <span class="text-danger">
        {{ $errors->first('phone_number') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="name">Company Address</label>
    <input type="text" name="address" id="address" class="form-control" value="{{ isset($company)? $company->address : old('address') }}">
    @if ($errors->first('address'))
    <span class="text-danger">
        {{ $errors->first('address') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="name">Company Website</label>
    <input type="text" name="website" id="website" class="form-control" value="{{ isset($company)? $company->website : old('website') }}">
    @if ($errors->first('website'))
    <span class="text-danger">
        {{ $errors->first('website') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="name">Company Email</label>
    <input type="text" name="email" id="email" class="form-control" value="{{ isset($company)? $company->email : old('email') }}">
    @if ($errors->first('email'))
    <span class="text-danger">
        {{ $errors->first('email') }}
    </span>
    @endif
</div>
<div class="text-center">
    <button type="submit" class="btn btn-success">{{isset($company)? "Save" : "Submit"}}</button>
</div>

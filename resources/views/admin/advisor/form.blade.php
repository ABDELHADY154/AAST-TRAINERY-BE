@csrf
{{--
'department_id' --}}
<div class="">
    <div class="avatar-upload text-center mb-3" {{isset($trainingAdvisor)? "data-image=\"".asset('storage/images/advisorsLogo/'. $trainingAdvisor->advisor_image)."\"":"" }}>
        <img class="avatar-preview" id="output" src="{{isset($trainingAdvisor)?asset('storage/images/advisorsLogo/'. $trainingAdvisor->advisor_image):""}}">
    </div>
    <div class=" row text-center justify-content-center">
        <div class="col-xl-8">
            <div class="form-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" onchange="loadFile(event)" name="advisor_image" value="{{ old('advisor_image') }}">
                    <label class="custom-file-label" for="customFile" id="labelIMG">Upload Your Image</label>
                </div>
                @error('advisor_image')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="name">Advisor Name</label>
    <input type="text" name="advisor_name" id="advisor_name" class="form-control" value="{{ isset($trainingAdvisor)?$trainingAdvisor->advisor_name : old('advisor_name') }}">
    @if ($errors->first('advisor_name'))
    <span class="text-danger">
        {{ $errors->first('advisor_name') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="name">Advisor Email</label>
    <input type="text" name="advisor_email" id="advisor_email" class="form-control" value="{{ isset($trainingAdvisor)? $trainingAdvisor->advisor_email : old('advisor_email') }}">
    @if ($errors->first('advisor_email'))
    <span class="text-danger">
        {{ $errors->first('advisor_email') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="name">Advisor Title</label>
    <input type="text" name="advisor_title" id="advisor_title" class="form-control" value="{{ isset($trainingAdvisor)?$trainingAdvisor->advisor_title : old('advisor_title') }}">
    @if ($errors->first('advisor_title'))
    <span class="text-danger">
        {{ $errors->first('advisor_title') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="name">Choose Department</label>
    <select name="department_id" id="department_id" class="form-control">

        <option value="0">Not Set</option>
        @foreach ($departments as $dep)
        @if(isset($trainingAdvisor) && $trainingAdvisor->department_id == $dep->id)
        <option value="{{$dep->id}}" selected>{{$dep->department_name}}</option>
        @endif
        <option value="{{$dep->id}}">{{$dep->department_name}}</option>
        @endforeach

    </select>
    @if ($errors->first('department_id'))
    <span class="text-danger">
        {{ $errors->first('department_id') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="desc">Advisor Bio</label>
    <textarea name="advisor_bio" id="advisor_bio" cols="30" rows="4" class="form-control">
    {{ isset($trainingAdvisor)?$trainingAdvisor->advisor_bio : old('advisor_bio') }}
    </textarea>
    @if ($errors->first('advisor_bio'))
    <span class="text-danger">
        {{ $errors->first('advisor_bio') }}
    </span>
    @endif
</div>




<div class="text-center">
    <button type="submit" class="btn btn-success">{{isset($trainingAdvisor)? "Save" : "Submit"}}</button>
</div>

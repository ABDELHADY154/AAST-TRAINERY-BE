@csrf
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function addNewReq() {
        const rowId = Date.now();
        const productRow = `
            <tr id="product-${rowId}">

                <td>
                    <input type="text"
                    name="reqs[${rowId}]"

                    row-id="product-${rowId}"
                    class="form-control input-product-quantity">
                </td>

                <td>
                    <button id="product-${rowId}"  type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">-</button>
                </td>
            </tr>
            `;
        $('#products-list').append(productRow);
    }

    function addNewTagRow() {
        const rowId = Date.now();
        const productRow = `
            <tr id="product-${rowId}">

                <td>
                    <input type="text"
                    name="tags[${rowId}]"

                    row-id="product-${rowId}"
                    class="form-control input-product-quantity">
                </td>

                <td>
                    <button id="product-${rowId}"  type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">-</button>
                </td>
            </tr>
            `;
        $('#tags-list').append(productRow);
    }
    $(document).on('click', '.row-delete', function() {
        const rowId = '#' + $(this).attr('row-id');
        $(rowId).remove();
    });

</script>


<div class="form-group">
    <label for="parent_id">Company</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value="0">Not set</option>
        @foreach($companies as $company)
        {{-- @if(isset($company) && $company->id == $company->id) --}}
        {{-- <option value="{{ $company->id }}" selected>{{ $company->company_name }}</option> --}}
        {{-- @else --}}
        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
        {{-- @endif --}}
        @endforeach
    </select>
    @if ($errors->first('parent_id'))
    <span class="text-danger">
        {{ $errors->first('parent_id') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="name">Internship Title</label>
    <input type="text" name="internship_title" id="internship_title" class="form-control" value="{{ isset($companyInternshipPost)?$companyInternshipPost->internship_title : old('internship_title') }}">
    @if ($errors->first('internship_title'))
    <span class="text-danger">
        {{ $errors->first('internship_title') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" id="gender" class="form-control">
        <option value="0">Not set</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Both">Both</option>
    </select>
    @if ($errors->first('gender'))
    <span class="text-danger">
        {{ $errors->first('gender') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="type">Type</label>
    <select name="type" id="type" class="form-control">
        <option value="0">Not set</option>
        <option value="Full Time">Full Time</option>
        <option value="Part Time">Part Time</option>

    </select>
    @if ($errors->first('type'))
    <span class="text-danger">
        {{ $errors->first('type') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="salary">Payment</label>
    <select name="salary" id="salary" class="form-control">
        <option value="0">Not set</option>
        <option value="Paid">Paid</option>
        <option value="Un Paid">Un Paid</option>
    </select>
    @if ($errors->first('salary'))
    <span class="text-danger">
        {{ $errors->first('salary') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="application_deadline">Application Deadline</label>
    <input type="date" name="application_deadline" id="application_deadline" class="form-control">
    @if ($errors->first('application_deadline'))
    <span class=" text-danger">
        {{ $errors->first('application_deadline') }}
    </span>
    @endif
</div>
<div class="form-group">
    <label for="desc">Internship Description</label>
    <textarea name="desc" id="desc" cols="30" rows="4" class="form-control">
    {{-- {{ isset($company)?$company->company_desc : old('desc') }} --}}
    </textarea>
    @if ($errors->first('desc'))
    <span class="text-danger">
        {{ $errors->first('desc') }}
    </span>
    @endif
</div>
<div class="row">
    <div class="col">
        <label>Internship Requirements
            @if ($errors->first('products'))
            <span class="text-danger">
                {{ $errors->first('products') }}
            </span>
            @endif

        </label>

        <button type="button" onclick="addNewReq()" class="btn btn-info">Add Requirement</button>
    </div>
    <table class="table mt-3">

        <tbody id="products-list">

            @if (old('reqs'))
            @foreach(old('reqs') as $rowId => $rowProduct)
            <tr id="product-${rowId}">
                <td>
                    <input type="text" name="reqs[${rowId}]" row-id="product-${rowId}" class="form-control input-product-quantity">
                </td>

                <td>
                    <button id="product-${rowId}" type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">-</button>
                </td>
            </tr>
            @endforeach
            @else
            {{-- <tr id="product-1">

                <td>
                    <input type="text" name="reqs[1]" row-id="product-1" class="form-control input-product-quantity">
                </td>

                <td>
                    <button type="button" class="btn btn-danger row-delete" row-id="product-1">-</button>
                </td>
            </tr> --}}
            @endif

        </tbody>

    </table>
</div>
<div class="row">
    <div class="col">
        <label>Internship Tags
            @if ($errors->first('tags'))
            <span class="text-danger">
                {{ $errors->first('tags') }}
            </span>
            @endif

        </label>

        <button type="button" onclick="addNewTagRow()" class="btn btn-info">Add Tag</button>
    </div>
    <table class="table mt-3">

        <tbody id="tags-list">

            @if (old('tags'))
            @foreach(old('tags') as $rowId => $rowProduct)
            <tr id="product-${rowId}">
                {{-- <td>
                    <input type="text" name="tags[${rowId}]" row-id="product-${rowId}" class="form-control input-product-quantity">
                </td> --}}
                <td>
                    <select name="products[{{$rowId}}]" class="form-control input-product-product_id" row-id="product-{{$rowId}}">
                        @foreach($studentInterests as $interest)
                        {{-- @if ($interest->id == $rowProduct) --}}

                        {{-- @else --}}
                        <option value="{{ $interest->id }}">
                            {{ $interest->name }}
                        </option>
                        {{-- @endif --}}
                        @endforeach
                    </select>

                    @if ($errors->first('products.' . $rowId ))
                    <span class="text-danger">
                        {{ $errors->first('products.' . $rowId ) }}
                    </span>
                    @endif
                </td>

                <td>
                    <button id="product-${rowId}" type="button" class="btn btn-danger row-delete" row-id="product-${rowId}">-</button>
                </td>
            </tr>
            @endforeach
            @else

            <tr id="product-1">

                <td>
                    <select name="products[1]" class="form-control input-product-product_id" row-id="product-1">
                        @foreach($studentInterests as $interest)
                        <option value="{{ $interest->id }}">
                            {{ $interest->interest }}
                        </option>
                        @endforeach
                    </select>


                </td>

                <td>
                    <button type="button" class="btn btn-danger row-delete" row-id="product-1">-</button>
                </td>
            </tr>
            @endif

        </tbody>

    </table>
</div>
{{-- <div class="form-group">
    <label for="reqs">Internship Requirements</label>
    <input type="text" name="reqs" id="reqs" class="form-control" data-role="tagsinput">
    <span>
        <button class="btn btn-danger">-</button>

    </span>
    @if ($errors->first('reqs'))
    <span class=" text-danger">
        {{ $errors->first('reqs') }}
</span>
@endif
</div> --}}
<div class="text-center">
    <button type="submit" class="btn btn-success">{{isset($companyInternshipPost)? "Save" : "Submit"}}</button>
</div>

@csrf
<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Album Name</label>
            <input type="text" name="{{$input}}" value="{{ isset($album) ? $album->{$input} : '' }}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    @php $input = "privacy"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Privacy</label>
            <select id="roleSelect" class="w-100 select2Multi @error($input) is-invalid @enderror" name="{{$input}}" >
                <option value="">Select Privacy</option>

                <option value="0" {{isset($album) ? $album->{$input}==0?'selected=""':'': ''}}>Private</option>
                <option value="1" {{isset($album) ? $album->{$input}==1?'selected=""':'': ''}}>Public</option>

            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

</div>

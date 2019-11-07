@csrf
<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Name</label>
            <input type="text" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    @php $input = "slug"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Url Friendly Name</label>
            <input type="text" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    @php $input = "permissions[]"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="">Permissions</label>
            <select class="w-100 select2Multi" id="permissionsSelect" name="{{$input}}" multiple="multiple">
                @foreach($permissions as $permission)



                    <option value="{{$permission->id}}" {{isset($row) ? in_array($permission->id,$row->permissions->pluck('id')->toArray())?'selected=""':'':''}}>{{$permission->name}}</option>
{{--                    <option value="{{$permission->id}}" selected="{{$row->permissions->contains($permission)?'selected':''}}">{{$permission->name}}</option>--}}
                @endforeach
            </select>

            @error($input)
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
{{--        <input type="checkbox" id="allPerm" >Select All--}}

    </div>

</div>

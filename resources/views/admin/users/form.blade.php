@csrf
<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Username</label>
            <input type="text" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    @php $input = "email"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email address</label>
            <input type="email" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    @php $input = "password"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="password" name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

<div class="clearfix w-100"></div>
    @php $input = "role"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="">Roles</label>
            <select id="roleSelect" class="w-100 select2Multi @error($input) is-invalid @enderror" name="{{$input}}" >
                <option value="">Select Role</option>
                @foreach($roles as $role)

                    <option value="{{$role->id}}" {{isset($row) ?in_array($role->id,$row->roles->pluck('id')->toArray())?'selected=""':'': ''}}>{{$role->name}}</option>

                @endforeach
            </select>

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
{{--                    <option value="{{$permission->id}}" {{in_array($permission->id,$row->permissions->pluck('id')->toArray())?'selected=""':''}}>{{$permission->name}}</option>--}}


                    <option value="{{$permission->id}}" {{isset($row) ? in_array($permission->id,$row->permissions->pluck('id')->toArray())?'selected=""':'' : ''}}>{{$permission->name}}</option>
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

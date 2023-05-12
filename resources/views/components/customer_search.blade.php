<div class="card">
    <div class="card-header">
        Search
    </div>
    <form action="{{ Request::url() }}" method="get">
        <div class="card-block">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{Request::get('name')}}" placeholder="Find Name..">
            </div>
            <div class="form-group">
                <label>Postcode</label>
                <input type="text" name="postcode" class="form-control" value="{{Request::get('postcode')}}" placeholder="Find Postcode..">
            </div>
            <div class="form-group">
                <label>Phone number</label>
                <input type="text" name="phone" class="form-control" value="{{Request::get('phone')}}" placeholder="Find Phone number..">
            </div>
            <div class="form-group">
                <label>Assigned to</label>
                <select name="user" class="form-control" size="1">
                    <option value="">Select user</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" size="1">
                    <option value="">Select status</option>

                    @foreach(Config::get('crm.lead_statuses') as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Search</button>
            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
        </div>
    </form>
</div>
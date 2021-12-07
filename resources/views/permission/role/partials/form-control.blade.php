<div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{old('name') ?? $role->name}}">    
                </div>    
                <div class="form-group">
                    <label for="guard_name">guard</label>
                    <input type="text" name="guard_name" id="guard_name" value="{{old('guard_name') ?? $role->guard_name}}">    
                </div> 
                <button type="submit" class="btn btn-success">{{$submit}}</button>
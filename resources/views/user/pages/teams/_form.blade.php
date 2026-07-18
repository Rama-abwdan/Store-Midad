<div class="card-body">
        <div class="form-group">
            <x-form.input id="name" name="name" type="text" placeholder="Enter  Name" label="Enter Name" :value="$member->name"/> 
        </div>

        <div class="form-group">
            <x-form.input id="email" name="email" type="email" placeholder="Enter Email" label="Enter Email" :value="$member->email"/> 
        </div>

        <div class="form-group">
            <x-form.input id="password" name="password" type="password" placeholder="Enter password" label="Enter Password" :value="''"/> 
        </div>

        <div class="form-group">
            <x-form.input id="password_confirmation" name="password_confirmation" type="password" placeholder="Enter Confirm password " label="Enter Password" :value="''"/> 
        </div>
        
</div>

@include('admin.layout.style')
@include('admin.layout.scripts')
<div class="containter">
    <form style="padding-top:40px; margin:auto; width: 300px;">
        <div class="mb-3">
            <label for="Inputlogin" class="form-label">Login</label>
            <input type="text" class="form-control" id="Inputlogin">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

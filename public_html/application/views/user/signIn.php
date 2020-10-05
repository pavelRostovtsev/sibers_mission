<div class="container d-flex justify-content-md-center mt-5">
    <div class="row ">
        <form action="/user/authorization" method="post">

            <div class="form-group">
                <label for="exampleInputLogin">Login</label>
                <input name="login" type="text" class="form-control" id="exampleInputLogin" >
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword" >
            </div>

            <input type="hidden" name="csrf" value="<?=$csrf;?>">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
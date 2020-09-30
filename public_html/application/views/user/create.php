<div class="container d-flex justify-content-md-center mt-5">
    <div class="row ">
        <form action="/user/store" method="post">

            <div class="form-group">
                <label for="exampleInputLogin">Login</label>
                <input name="login" type="text" class="form-control" id="exampleInputLogin" >
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword" >
            </div>

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputName" >
            </div>

            <div class="form-group">
                <label for="exampleInputSurname">Surname</label>
                <input name="surname" type="text" class="form-control" id="exampleInputSurname" >
            </div>

            <div class="form-check mt-2 mb-2">
                <div>
                    <label for="gender">gender</label>
                    <select name="gender" id="">
                        <option value="1">man</option>
                        <option value="2">wooman</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputDate">Date</label>
                <input name="date" type="date" class="form-control" id="exampleInputDate" >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
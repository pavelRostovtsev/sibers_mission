<div class="container d-flex justify-content-md-center mt-5">
    <div class="row ">
        <form action="/user/update/<?=$data['id']?>" method="post">
            <div class="form-group">
                <label for="exampleInputLogin">Login</label>
                <input name="login" type="text" class="form-control" id="exampleInputLogin" value="<?=$data['login']?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input name="password" type="text" class="form-control" id="exampleInputPassword" value="<?=$data['password']?>">
            </div>

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputName" value="<?=$data['name']?>">
            </div>

            <div class="form-group">
                <label for="exampleInputSurname">Surname</label>
                <input name="surname" type="text" class="form-control" id="exampleInputSurname" value="<?=$data['surname']?>">
            </div>

            <div class="form-check mt-2 mb-2">
                <div>
                    <label for="gender">gender</label>
                    <select name="gender">
                        <?php if($data['gender'] == 1) : ?>
                            <option selected value="1">man</option>
                            <option value="2">wooman</option>
                        <?php else : ?>
                            <option value="1">man</option>
                            <option selected value="2">wooman</option>
                        <?php endif;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputDate">Date</label>
                <input name="date" type="date" class="form-control" id="exampleInputDate" value="<?=$data['date']?>">
            </div>

            <input type="hidden" name="csrf" value="<?=$csrf;?>">
            <input type="hidden" name="id" value="<?=$id;?>">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
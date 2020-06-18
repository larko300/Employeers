<div class="col-md-8">
    <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form method="POST" action="/users/register">

                <?php include 'Errors.php'?>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" value="<?= $_POST['name'] ?>" name="name" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email_or_phone" class="col-md-4 col-form-label text-md-right">E-mail address or phone</label>

                    <div class="col-md-6">
                        <input id="email_or_phone" value="<?= $_POST['email_or_phone'] ?>" class="form-control" name="email_or_phone" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input  type="password" class="form-control " name="password"  autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                    <div class="col-md-6">
                        <input   type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-8">
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="POST" action="/users/login">

                <?php include 'Errors.php'?>

                <?php include 'Success.php'?>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-mail address or phone</label>

                    <div class="col-md-6">
                        <input class="form-control" name="email_or_phone"  autocomplete="email" value="<?= $_POST['email'] ?>" autofocus >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password"  autocomplete="current-password" value="">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

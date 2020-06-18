<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="/employers/<?= $data['employer']->getId() ?>/update" method="post">
                    <?php include 'Errors.php'?>
                    <div class="d-flex">
                        <div class="p-2"><h5 class="card-title">Edit car</h5></div>
                        <div class="ml-auto p-2"><a href="/employers"><button type="submit" class="btn btn-secondary">Back</button></a></div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="fname">Имя</span>
                        </div>
                        <input type="text" name="fname" value="<?= $_POST['fname'] ? $_POST['fname'] : $data['employer']->getFname() ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="sname">Фамилия</span>
                        </div>
                        <input type="text" name="sname" class="form-control" value="<?= $_POST['sname'] ? $_POST['sname'] : $data['employer']->getSname() ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="sname">Отчество</span>
                        </div>
                        <input type="text" name="pname" class="form-control" value="<?= $_POST['pname'] ? $_POST['pname'] : $data['employer']->getPname()?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
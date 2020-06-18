
<div class="col-md-12 mt-4">
    <form class="mb-4" method="POST" action="/employers/create">
        <?php if (!empty($data['error'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $data['error'] ?>
            </div>
        <?php endif; ?>

        <?php
        if (!empty($_SESSION['flesh'])) :
            ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['flesh'] ?>
            </div>
            <?php
            unset($_SESSION['flesh']);
        endif;
        ?>
        <div class="form-group row">
            <label for="fname" class="col-md-4 col-form-label text-md-right">Имя</label>

            <div class="col-md-6">
                <input id="fname" name="fname" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="sname" class="col-md-4 col-form-label text-md-right">Фамилия</label>

            <div class="col-md-6">
                <input id="sname" name="sname" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="pname" class="col-md-4 col-form-label text-md-right">Отчество</label>

            <div class="col-md-6">
                <input id="pname" name="pname" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Add new employer
                </button>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card-header">
                <h3>Employers</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                </tr>
                </thead>
                <?php foreach ($data['employers'] as $employer): ?>
                <tbody>
                <tr>
                    <td><?=  $employer->getId() ?></td>
                    <td><?=  $employer->getFname() ?></td>
                    <td><?=  $employer->getPname() ?></td>
                    <td><?=  $employer->getSname() ?></td>
                </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
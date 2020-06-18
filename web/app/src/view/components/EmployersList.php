
<div class="col-md-12 mt-4">
    <?php include 'Errors.php'?>
    <?php include 'Success.php'?>
    <div class="row">
        <form class="col-6 mb-4" method="POST" action="/employers/create">
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
        <div class="col-6 mb-4">
            <form method="post">
                <div class="form-group row">
                    <div class="col-7">
                        <input placeholder="Find employer" id="q" name="q" type="text" class="form-control">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            Search
                        </button>
                    </div>
                    <div class="col">
                        <a href="/employers"><button type="submit" class="btn btn-primary">Reset</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                    <td><?=  $employer->getSname() ?></td>
                    <td><?=  $employer->getPname() ?></td>
                    <td><form method="post" action="/employers/<?=  $employer->getId() ?>/destroy"><button type="submit" class="btn btn-danger">Delete</button></form></td>
                    <td><form method="post" action="/employers/<?=  $employer->getId() ?>/edit"><button type="submit" class="btn btn-primary">Edit</button></form></td>
                </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
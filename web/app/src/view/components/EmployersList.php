<div class="col-md-12 mt-4">
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
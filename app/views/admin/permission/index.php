<div class="row justify-content-center">
    <div class="col-md-10">
        <a href="<?= BASEURL ?>/Permission/Create" class="btn btn-primary mb-2">Create</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10 shadow p-5">
        <h4 class="text-center">Permission Data</h4>
        <table id="datatable" class="table table-striped table-bordered pb-5" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Rolle Name</th>
                    <th>Module Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['permission'] as $permission): ?>
                    <tr>
                        <td><?= $permission->id ?></td>
                        <td><?= $permission->r_name ?></td>
                        <td><?= $permission->m_name ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= BASEURL ?>/Permission/edit/<?= $permission->id ?>">edit</a>
                            <a class="btn btn-danger" href="<?= BASEURL ?>/Permission/delete/<?= $permission->id ?>">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
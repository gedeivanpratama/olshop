<div class="row justify-content-center">
    <div class="col-md-10">
        <a href="<?= BASEURL ?>/Role/Create" class="btn btn-primary mb-2">Create</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10 shadow p-5">
        <h4 class="text-center">Rolle Data</h4>
        <table id="datatable" class="display hover text-center pb-5" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['role'] as $role): ?>
                    <tr>
                        <td><?= $role->id ?></td>
                        <td><?= $role->name ?></td>
                        <td><?= $role->description ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= BASEURL ?>/Role/edit/<?= $role->id ?>">edit</a>
                            <a class="btn btn-danger" href="<?= BASEURL ?>/Role/delete/<?= $role->id ?>">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <a href="<?= BASEURL ?>/Module/Create" class="btn btn-primary mb-2">Create</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10 shadow p-4">
        <h4 class="text-center">Module Data</h4>
        <table id="datatable" class="table table-striped table-bordered pb-5" style="width:100%">
        <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['module'] as $module): ?>
                    <tr>
                        <td><?= $module->id ?></td>
                        <td><?= $module->name ?></td>
                        <td><?= $module->description ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= BASEURL ?>/Module/edit/<?= $module->id ?>">edit</a>
                            <a class="btn btn-danger" href="<?= BASEURL ?>/Module/delete/<?= $module->id ?>">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
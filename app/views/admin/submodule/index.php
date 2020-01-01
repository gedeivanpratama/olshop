<div class="row justify-content-center">
    <div class="col-md-10">
        <a href="<?= BASEURL ?>/SubModule/Create" class="btn btn-primary mb-2">Create</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10 shadow p-4">
        <h4 class="text-center">Sub Module Data</h4>
        <table id="datatable" class="table table-striped table-bordered pb-5" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Module</th>
                    <th>Url</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['submodule'] as $sub): ?>
                    <tr>
                        <td><?= $sub->id ?></td>
                        <td><?= $sub->s_name ?></td>
                        <td><?= $sub->m_name ?></td>
                        <td><?= $sub->url ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= BASEURL ?>/SubModule/edit/<?= $sub->id ?>">edit</a>
                            <a class="btn btn-danger" href="<?= BASEURL ?>/SubModule/delete/<?= $sub->id ?>">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
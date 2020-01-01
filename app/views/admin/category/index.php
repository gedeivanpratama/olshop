<div class="row justify-content-center">
    <div class="col-md-10">
        <a href="<?= BASEURL ?>/Category/create" class="btn btn-primary mb-2">Create</a>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10 shadow p-5">
        <h4 class="text-center">Category Data</h4>
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
                <?php foreach($data['category'] as $category): ?>
                    <tr>
                        <td><?= $category->id ?></td>
                        <td><?= $category->name ?></td>
                        <td><?= $category->description ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= BASEURL ?>/Category/edit/<?= $category->id ?>">edit</a>
                            <a class="btn btn-danger" href="<?= BASEURL ?>/Category/delete/<?= $category->id ?>">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6 shadow py-3 px-3">
        <h4 class="text-center">Edit Rolle</h4>
        <form action="<?= BASEURL ?>/Role/Update/<?= $data['role']->id ?>" method="post">
            <div class="form-group">
                <label for="">Name :</label>
                <?php if(Msg::check('name')): ?>
                    <div class="text-danger"><?php Msg::get('name'); ?></div>
                <?php endif ?>
                <input type="text" class="form-control" name="name" value="<?= $data['role']->name ?>">
            </div>
            <div class="form-group">
                <label for="">Description :</label>
                <?php if(Msg::check('description')): ?>
                    <div class="text-danger"><?php Msg::get('description'); ?></div>
                <?php endif ?>
                <textarea name="description" class="form-control" cols="30" rows="10"><?= $data['role']->description ?></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
</div>
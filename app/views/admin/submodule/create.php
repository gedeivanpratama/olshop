<div class="row justify-content-center">
    <div class="col-md-6 shadow py-3 px-3">
        <h4 class="text-center">Create Sub Module</h4>
        <form action="<?= BASEURL ?>/SubModule/Store/" method="post">
            <div class="form-group">
                <label for="">Name :</label>
                <?php if(Msg::check('name')): ?>
                    <div class="text-danger"><?php Msg::get('name'); ?></div>
                <?php endif ?>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">Url :</label>
                <?php if(Msg::check('url')): ?>
                    <div class="text-danger"><?php Msg::get('url'); ?></div>
                <?php endif ?>
                <input type="text" class="form-control" name="url">
            </div>
            <div class="form-group">
                <label for="">Module :</label>
                <?php if(Msg::check('module')): ?>
                    <div class="text-danger"><?php Msg::get('module'); ?></div>
                <?php endif ?>
                <select name="module" id="" class="form-control">
                    <?php foreach ($data['module'] as $module): ?>
                        <option value="<?= $module->id ?>"><?= $module->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</div>
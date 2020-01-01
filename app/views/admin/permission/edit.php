<div class="row justify-content-center">
    <div class="col-md-6 shadow py-3 px-3">
        <h4 class="text-center">Edit Permision</h4>
        <form action="<?= BASEURL ?>/Permission/Update/" method="post">
            <div class="form-group">
                <label for="">Rolle Name :</label>
                <?php if(Msg::check('rolle')): ?>
                    <div class="text-danger"><?php Msg::get('rolle'); ?></div>
                <?php endif ?>
                <select name="rolle" id="" class="form-control">
                    <?php foreach ($data['rolle'] as $rolle) : ?>
                        <option value="<?= $rolle->id ?>" <?= ($data['roletomodule']->rolle_id === $rolle->id)?'selected':''; ?>><?= $rolle->name ?></option>
                    <?php endforeach; ?>
                </select>
                
            </div>
            <div class="form-group">
                <label for="">Module Name :</label>
                <?php if(Msg::check('module')): ?>
                    <div class="text-danger"><?php Msg::get('module'); ?></div>
                <?php endif ?>
                <select name="module" id="" class="form-control">
                    <?php foreach ($data['module'] as $module) : ?>
                        
                        <option value="<?= $module->id ?>" <?= ($data['roletomodule']->module_id === $module->id)?'selected':''; ?>><?= $module->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</div>
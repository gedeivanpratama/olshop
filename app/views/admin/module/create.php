<div class="row justify-content-center">
    <div class="col-md-6 shadow py-3 px-3">
        <h4 class="text-center">Create Module</h4>
        <form action="<?= BASEURL ?>/Module/Store/" method="post">
            <div class="form-group">
                <label for="">Name :</label>
                <?php if(Msg::check('name')): ?>
                    <div class="text-danger"><?php Msg::get('name'); ?></div>
                <?php endif ?>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">Description :</label>
                <?php if(Msg::check('description')): ?>
                    <div class="text-danger"><?php Msg::get('description'); ?></div>
                <?php endif ?>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
</div>
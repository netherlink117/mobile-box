<div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
        Find
    </button>
    <?php if (isset($attachments['admin'])): ?>
    <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add new
    </button>
    <?php endif; ?>
</div>
<div class="collapse mb-3" id="collapseFilters">
    <form action="/providers" method="get" class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <label for="name" class="form-label d-block">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="col-12 flex-grow-1">
                    <input type="hidden" name="admin" value="">
                    <button type="submit" class="btn btn-primary float-end mt-3">Go</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php if (isset($attachments['phone'])): ?>
    <?= view('pages/phones/reference'); ?>
<?php else: ?>
    <?= view('pages/providers/post'); ?>
<?php endif; ?>
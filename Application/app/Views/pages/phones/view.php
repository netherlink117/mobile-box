<div class="card mb-3">
    <div class="row g-0">
        <div id="carousel" class="carousel slide col-md-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/id/119/720.webp" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/id/0/720.webp" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/id/160/720.webp" class="d-block w-100 img-fluid" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="col-md-6 d-flex flex-column">
            <div class="card-body">
                <h5 class="card-title"><?= $attachments['phone']['model']; ?></h5>
                <p class="card-text"><?= $attachments['phone']['brand']; ?></p>
                <p class="text-muted"><?= $attachments['phone']['description']; ?></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card pt-3 pb-3">
                            <div class="text-center h6"><?= $attachments['phone']['cores']; ?></div>
                            <div class="display-3 text-center">
                                <i class="bi bi-cpu"></i>
                            </div>
                            <div class="text-center">Cores</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card pt-3 pb-3">
                            <div class="text-center h6"><?= $attachments['phone']['ram']; ?>Mb</div>
                        <div class="display-3 text-center">
                        <i class="bi bi-memory"></i>
                            </div>
                            <div class="text-center">RAM</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card pt-3 pb-3">
                            <div class="text-center h6"><?= $attachments['phone']['battery']; ?>mAh</div>
                        <div class="display-3 text-center">
                        <i class="bi bi-battery"></i>
                            </div>
                            <div class="text-center">Battery</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer align-self-end w-100">
                <div class="d-flex justify-content-end">
                    <?php if (isset($attachments['admin'])): ?>
                    <div class="h5">
                    <?= $attachments['phone']['stock']; ?> on stock
                    </div>
                    <?php else: ?>
                    <button class="btn btn-primary">Buy now for <?= $attachments['phone']['price']; ?>&dollar;</button>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($attachments['admin'])): ?>
<hr>
<h5 class="h5">Providers</h5>
<?= view('pages/providers/index'); ?>
<?php endif; ?>
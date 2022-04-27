<?= view('pages/phones/menu'); ?>
<?= view('components/alerts'); ?> 
<?php if (isset($attachments['admin'])): ?>
<div class="card mb-3">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Cores</th>
                    <th>RAM</th>
                    <th>Battery</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attachments['phones'] as &$phone): ?>
                <tr onclick="window.location = 'http://localhost">
                    <td><?= $phone['brand']; ?></td>
                    <td><?= $phone['model']; ?></td>
                    <td><?= $phone['cores']; ?></td>
                    <td><?= $phone['ram']; ?>Mb</td>
                    <td><?= $phone['battery']; ?>mAh</td>
                    <td><?= $phone['stock']; ?></td>
                    <td><?= $phone['price']; ?></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="/phones/<?= $phone['id']; ?>?admin=">Manage</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php else: ?>
<div class="row mb-3">
    <?php foreach ($attachments['phones'] as &$phone): ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 pb-3">
        <a href="/phones/<?= $phone['id']; ?>" class="text-reset text-decoration-none">
            <div class="card">
                <img src="https://picsum.photos/id/119/720.webp" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?= $phone['model']; ?></h5>
                    <p class="card-text"><?= $phone['brand']; ?></p>
                    <p><small class="text-muted"><?= $phone['price']; ?>&dollar;</small></p>
                </div>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
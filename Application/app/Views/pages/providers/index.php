<?= view('pages/providers/menu'); ?>
<?= view('components/alerts'); ?> 
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <?php if (isset($attachments['phone'])): ?>
                    <th>Price</th>
                    <?php endif; ?>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attachments['providers'] as &$provider): ?>
                    <tr>
                        <td><?= $provider['name']; ?></td>
                        <td><?= $provider['contact']; ?></td>
                        <?php if (isset($attachments['phone'])): ?>
                        <th><?= $provider['price']; ?></th>
                        <?php endif; ?>
                        <td>
                            <div class="d-flex justify-content-between">
                                <?php if (isset($attachments['phone'])): ?>
                                <a href="/supply/<?= $provider['id']; ?>/<?= $attachments['phone']['id']; ?>?admin=">View</a>
                                <?php endif; ?>
                                <a href="/providers/<?= $provider['id']; ?>?admin=">Supply</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
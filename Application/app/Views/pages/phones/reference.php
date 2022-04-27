<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/phones/<?= $attachments['phone']['id']; ?>/providers?admin=" method="post" class="modal-content">
            <header class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Register provider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </header>
            <div class="modal-body">
                <input type="hidden" name="phone" value="<?= $attachments['phone']['id']; ?>">
                <label for="Provider" class="form-label">Provider</label>
                <select name="provider" id="provider" class="form-select" aria-label="Provider">
                    <?php foreach($attachments['providers_unreferenced'] as &$unreferenced): ?>
                    <option value="<?= $unreferenced['id']; ?>"><?= $unreferenced['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="price" class="form-label">Unit price</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<div class="mb-3">
  <?php foreach($attachments['alerts'] as &$alert): ?>
  <div class="alert alert-<?= $alert['type']; ?> alert-dismissible fade show" role="alert">
    <?= $alert['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endforeach; ?>
</div>
<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="/<?= isset($attachments['admin']) ? '?admin=' : ''; ?>">Mobile-box</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/phones<?= isset($attachments['admin']) ? '?admin=' : ''; ?>">Phones</a>
        </li>
        <?php if (isset($attachments['admin'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="/providers?admin=">Providers</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
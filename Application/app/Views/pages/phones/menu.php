<div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
        Filter
    </button>
    <?php if (isset($attachments['admin'])): ?>
    <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add new
    </button>
    <?php endif; ?>
</div>
<div class="collapse mb-3" id="collapseFilters">
    <form action="/phones" method="get" class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <label for="brand" class="form-label d-block">Brand</label>
                    <input type="text" name="brand" id="brand" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <label for="model" class="form-label d-block">Model</label>
                    <input type="text" name="model" id="model" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <label for="cores" class="form-label d-block">Cores</label>
                    <input id="cores" name="core" type="text" data-provide="slider" data-slider-min="1" data-slider-max="10" data-slider-value="[1,10]" data-slider-step="1"/>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <label for="ram" class="form-label d-block">RAM</label>
                    <input id="ram" name="ram" type="text" data-provide="slider" data-slider-min="1024" data-slider-max="16384" data-slider-value="[1024,16384]" data-slider-step="1024"/>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <label for="battery" class="form-label d-block">Battery</label>
                    <input id="battery" name="battery" type="text" data-provide="slider" data-slider-min="1000" data-slider-max="10000" data-slider-value="[1000,10000]" data-slider-step="500"/>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <label for="price" class="form-label d-block">Price</label>
                    <input id="price" name="price" type="text" data-provide="slider" data-slider-min="100" data-slider-max="3000" data-slider-value="[100,3000]" data-slider-step="100"/>
                </div>
                <div class="col-12 flex-grow-1">
                    <?php if (isset($attachments['admin'])): ?>
                    <input type="hidden" name="admin" value="">
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary float-end mt-3">Go</button>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css">
    <style>
        .slider, .slider-horizontal {
            width: 100% !important;
            backgorund-color: red;
        }
    </style>
</div>
<?php if (isset($attachments['admin'])): ?>
    <?= view('pages/phones/post'); ?>
<?php endif; ?>
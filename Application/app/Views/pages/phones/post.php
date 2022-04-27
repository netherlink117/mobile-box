<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/phones?admin=" method="post" class="modal-content">
            <header class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Register phone</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </header>
            <div class="modal-body">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" name="brand" id="brand" class="form-control">
                <label for="model" class="form-label">Model</label>
                <input type="text" name="model" id="model" class="form-control">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control">
                <label for="cores" class="form-label">Cores</label>
                <input type="text" name="cores" id="cores" class="form-control">
                <label for="ram" class="form-label">RAM</label>
                <input type="text" name="ram" id="ram" class="form-control">
                <label for="battery" class="form-label">Battery</label>
                <input type="text" name="battery" id="battery" class="form-control">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
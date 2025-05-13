<div class="row">
    <p class="d-inline-flex gap-1 m-3">
        <button class="btn btn-outline-light me-3" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Models</button>
        <button class="btn btn-outline-light me-3" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2"><i class="bi bi-plus"></i> Add new vhicle</button>
    </p>
</div>

<div class="row m-3">
    <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample1">
            <div class="card card-body bg-dark bg-gradient ">
                <?php require_once 'model.form.php';?>
            </div>
        </div>
    </div>
</div>
<div class="row m-3">
    <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample2">
            <div class="card card-body bg-dark bg-gradient">
                <?php require_once 'add.vehicle.form.php';?>
            </div>
        </div>
    </div>
</div>


<div class="row m-3">
    <div class="col">
        <form action="/search_admin" method="POST" role="search" class="d-flex justify-content-end">
            <input class="form-control m-2 w-25" type="search" name="search_admin" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
        </form>
        <?php require_once 'table.section.php';?>
    </div>
</div>
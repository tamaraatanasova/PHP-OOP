
<div class="row">
    <p class="d-inline-flex gap-1 m-3">
        <a class="btn btn-outline-light me-3" data-bs-toggle="collapse" data-bs-target="#view" aria-expanded="false" aria-controls="view" >Show all</a>
        <a class="btn btn-outline-light me-3"  data-bs-toggle="collapse" data-bs-target="#add" aria-expanded="false" aria-controls="add"><i class="bi bi-plus"></i> Create model</a>
    </p>
</div>

<div class="row m-3">
<!--        show all models in database-->
    <div class="col">
        <div class="collapse multi-collapse" id="view">
            <div class="card card-body bg-dark bg-gradient ">
                <?php require_once __DIR__ . '/show.models.partial.php';?>
            </div>
        </div>
    </div>
<!--        add new model in dababase-->
    <div class="col">
        <div class="collapse multi-collapse" id="add">
            <div class="card card-body bg-dark bg-gradient ">
                <?php require_once __DIR__ . '/create.model.php';?>
            </div>
        </div>
    </div>

</div>




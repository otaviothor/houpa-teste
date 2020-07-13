<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
  <div class="card shadow">
    <img class="card-img-top" src="<?= upload("/{$product->image_url}"); ?>" alt="<?= $product->name; ?>">
    <div class="card-body">
      <h5 class="card-title"><?= $product->name ?></h5>
      <p class="card-text text-muted">R$ <?= $product->price ?></p>
      <a href="<?= $router->route("web.show", ["id" => $product->id]); ?>" class="btn btn-outline-dark px-3">Ver</a>
    </div>
  </div>
</div>
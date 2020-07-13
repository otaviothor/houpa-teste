<?php $v->layout("_theme"); ?>

<div class="container my-5">
  <h1 class="py-5"><?= $product->data->name; ?></h1>
  <div class="row">
    <div class="col-md-8">
      <img class="img-fluid" src="<?= upload("/{$product->data->image_url}"); ?>" alt="<?= $product->data->name; ?>">
    </div>
    <div class="col-md-4">
      <h3 class="my-3">
        Descrição
      </h3>
      <p>
        <?= $product->data->description; ?>
      </p>
      <h3 class="my-3 font-weight-bold">
        R$ <?= $product->data->price; ?>
      </h3>

      <a href="<?= $router->route("web.showFormEdit", ["id" => $product->data->id]); ?>" class="btn btn-primary mt-5 btn-block">
        <i class="far fa-edit"></i> Editar
      </a>

      <a href="#" data-action="<?= $router->route("web.delete"); ?>" data-id="<?= $product->data->id; ?>" class="btn btn-danger btn-block delete">
        <i class="far fa-trash-alt"></i> Excluir
      </a>
    </div>
  </div>
</div>

<?php
$v->start("js");
?>
<script>
  $(() => {
    $("body").on("click", "[data-action]", function(e) {
      e.preventDefault();
      var data = $(this).data();

      swal({
          title: "Excluir produto!",
          text: "Deseja realmente excluir o produto",
          icon: "warning",
          buttons: ["Cancelar", "Sim"],
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: data.action,
              data: data,
              type: "POST",
              dataType: "json",
              success: function(callback) {
                if (callback.message) {
                  swal({
                    title: callback.message,
                    icon: "success",
                    buttons: [false, "Ok"],
                  })
                  .then(areClosed => {
                    if (areClosed) location.href = '<?= url(); ?>'
                  })
                  ;
                }
              },
              error: function() {
                swal({
                  title: "Erro na exclusão do produto!",
                  icon: "error",
                });
              }
            });
          }
        });
    });
  });
</script>
<?php
$v->end();
?>
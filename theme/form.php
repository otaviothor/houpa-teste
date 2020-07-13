<?php $v->layout("_theme"); ?>

<div class="container">
	<div class="py-5">
		<h2 class="mt-5"><?= $title; ?></h2>
		<p class="lead"><?= $subtitle; ?></p>
	</div>

	<div class="row">
		<div class="col-md-4 order-md-2 mb-4">
			<div class="card shadow">
				<img class="card-img-top" src="https://via.placeholder.com/150x100" alt="">
				<div class="card-body">
					<h5 class="card-title">Nome do produto</h5>
					<p class="card-text text-muted">R$ <span class="card-price">189,99</span></p>
				</div>
			</div>
		</div>
		<div class="col-md-8 order-md-1">
			<form method="post" action="<?= $router->route("web.create"); ?>">
				<div class="row">
					<div class="col-12 col-sm-12 mb-3">
						<label for="name">Nome do produto</label>
						<input type="text" class="form-control name" id="name" name="name" placeholder="Blusa Nike SB" />
					</div>
				</div>

				<div class="row">
					<div class="col-md-8 col-sm-12 mb-3">
						<label for="image">Foto</label>
						<select class="form-control" name="image" id="image" onchange="imagePreview(this)">
							<option>Selecione o tipo de roupa</option>
							<option value="blusa.jpg">Blusa de frio</option>
							<option value="jaqueta.jpg">Jaqueta</option>
							<option value="calca.jpg">Calça</option>
							<option value="saia.jpg">Saia</option>
							<option value="bermuda.jpg">Bermuda</option>
							<option value="camiseta.jpg">Camiseta</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-12 mb-3">
						<label for="price">Preço</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">R$</span>
							</div>
							<input type="text" class="form-control price" id="price" placeholder="189,99" name="price" data-mask="000.000,00" data-mask-reverse="true" />
						</div>
					</div>
				</div>

				<div class="mb-3">
					<label for="description">Descrição do produto</label>
					<textarea class="form-control" id="description" rows="5" name="description"></textarea>
				</div>

				<hr class="mb-4">
				<button class="btn btn-primary btn-lg btn-block mb-5" type="submit">Cadastrar produto</button>
			</form>
		</div>
	</div>
</div>

<?php
$v->start("js");
?>
<script>
	function imagePreview(select) {
		if (select.value) {
			$('.card-img-top').attr('src', `uploads/${select.value}`);
		}
	}

	$(".name").on("keyup", () => {
		var data = $(".name").val()
		$(".card-title").html(data)
	})

	$(".price").on("keyup", () => {
		var data = $(".price").val()
		$(".card-price").html(data)
	})

	$("form").submit(function(e) {
		e.preventDefault();
		var form = $(this);

		$.ajax({
			url: form.attr("action"),
			data: form.serialize(),
			type: "POST",
			dataType: "json",
			success: function(callback) {
				if (callback.error) {
					swal({
						title: callback.message,
						icon: "warning",
						buttons: [false, "Ok"],
					})
				} else {
					swal({
							title: callback.message,
							icon: "success",
							buttons: [false, "Ok"],
						})
						.then(areClosed => {
							if (areClosed) location.href = '<?= url(); ?>'
						});
				}
			},
			error: function() {
				swal({
					title: "Erro na exclusão do produto!",
					icon: "error",
				});
			}
		});
	});
</script>
<?php
$v->end();
?>
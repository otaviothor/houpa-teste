<?php $v->layout("_theme"); ?>

<div class="py-5 mt-5 text-center text-white header-hero">
    <div class="py-5 my-5">
        <h1 class="display-4"><i class="fas fa-tshirt"></i> InovaWear.</h1>
        <p class="lead">"A marca feita para quem quer se vestir bem"</p>
    </div>
</div>

<div class="container py-5">
    <h1>Sobre a marca.</h1>
    <p class="my-4">
        A marca InovaWear. foi criada com o objetivo de atingir a todas as pessoas que querem se vestir de acordo com o hype do momento e com o que há de melhor disponível hoje no mercado. Trabalhamos com os melhores tecidos que são sustentáveis para não agredir o meio ambiente e resistentes para fazer sua roupa durar.
    </p>

    <hr />

    <h1 class="my-4">Produtos.</h1>

    <div class="row">
        <?php
        if (!empty($products)) :
            foreach ($products as $product) :
                $v->insert("card", ["product" => $product]);
            endforeach;
        else :
        ?>
            <div class="col-12 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Nenhum produto cadastrado</h5>
                    </div>
                </div>
            </div>
        <?php
        endif;
        ?>
    </div>
</div>
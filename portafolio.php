
<?php


// Consulta para obtener todos los proyectos con los campos necesarios
$sql = "SELECT * FROM proyectos ";
$resultado = $dbpr->query($sql);

?>

<section id="portfolio">
    <div class="container-fluid wrapper">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-heading">Portafolio</h2>
            </div>
            <div class="col-xs-12 col-md-12 portfolio-submenu text-center">
                <ul class="filter">
                    <li><a class="active" href="#" data-filter="*">All</a></li>
                    <li><a href="#" data-filter=".webDesign">Diseño Web</a></li>
                    <li><a href="#" data-filter=".web">Web</a></li>
                    <li><a href="#" data-filter=".webServices">Servicio Web</a></li>
                    <li><a href="#" data-filter=".graphicDesign">Diseño Gráfico</a></li>
                    <li><a href="#" data-filter=".bootstrap">Netbeans</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="portfolio-wrapper portfolio-container-fluid">
        <div class="portfolio-items">
            <?php while ($proyecto = $resultado->fetch_assoc()): ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 work-grid <?= htmlspecialchars($proyecto['categoria'])?>">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#portfolioModal" class="portfolio-link" data-toggle="modal" data-id="<?= htmlspecialchars($proyecto['id']) ?>">
                                <div class="hover-text">
                                    <h4><?= htmlspecialchars($proyecto['titulo']) ?></h4>
                                    <h5><?= htmlspecialchars($proyecto['intro']) ?></h5>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="<?= htmlspecialchars($proyecto['imgPortda']) ;?>" class="img-responsive" alt="portfolio-image">
                            </a>
                        </div>
                    </div>
                </div>        
                <?php endwhile; ?>
            </div>
        </div>
    </section>





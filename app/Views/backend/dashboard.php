<?= $this->extend('backend/layout');?>
<?= $this->section('content');?>
      
    <div class="container-fluid" style="padding-top: 80px;">
        <!--<h1 class="mt-4">Bienvenue sur votre Dashboard</h1>
        <p>Contenu du tableau de bord ici...</p>-->
        <!-- Graphique -->
        <div class="my-4">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
        <!-- Ajoutez vos widgets ou contenu ici -->
    
    </div>
      
<?= $this->endSection();?>         
<?php require_once APPROOT . '/views/includes/header.php'; ?>
<?php flash('experiment_message'); ?>
<div class=" row d-flex flex-justify-content-end p-3 ">
    <div class="col-sm-6">
        <h4>Experiments</h4>
    </div>
    <div class="col-sm-6 p-1">
        <a href="<?php echo URLROOT; ?>/experiments/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil">Add Eeperiment</i>
        </a>
        <a href="<?php echo URLROOT; ?>/experiments/upload" class="btn btn-primary pull-right">
            <i class="fa fa-pencil">Add Uploads</i>
        </a>
        <a href="<?php echo URLROOT; ?>/experiments/ethics" class="btn btn-primary pull-right">
            <i class="fa fa-pencil">Add Ethics Form</i>
        </a>
    </div>


    <?php foreach($data['experiments'] as $experiment): ?>
      
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $experiment->project_title; ?></h4>
        <div class="bg-light p-2 mb-3">
            written by <?php echo $experiment->name; ?> on <?php echo $experiment->experimentCreated ;?>
        </div>
        <p class="card-text"><?php echo $experiment->lay_summary ; ?></p>

        <a href="<?php echo URLROOT; ?>/experiments/show/<?php echo $experiment->experimentId ; ?>"
            class="btn btn-dark">More</a>
    </div>
   
    <?php endforeach; ?>


    <?php require_once APPROOT . '/views/includes/footer.php'; ?>




 

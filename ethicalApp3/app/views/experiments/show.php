<?php require_once APPROOT . '/views/includes/header.php'; ?>
<a href="<?php echo URLROOT; ?>/experiments/" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<br>
<?php if($data['experiment']->user_id == $_SESSION['user_id']) : ?>
<h4><?php echo $data['experiment']->project_title; ?></h4>
<div class="bg-secondary text-white p-2 mb-3">
  Written by <?php echo $data['user']->name; ?> on <?php echo $data['experiment']->created_at; ?>
</div>
<p><?php echo $data['experiment']->lay_summary; ?></p>


  <hr>
  <a href="<?php echo URLROOT; ?>/experiments/edit/<?php echo $data['experiment']->id; ?>" class="btn btn-dark">Edit</a>

  <form class="pull-right" action="<?php echo URLROOT; ?>/experiments/delete/<?php echo $data['experiment']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
<?php endif; ?>


<?php require_once APPROOT . '/views/includes/footer.php'; ?>

       


<?php require_once APPROOT . '/views/includes/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/experiments" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    Edit Experiment
    <form action="<?php echo URLROOT; ?>/experiments/edit/<?php echo $data['id'] ?>" method="post">
      <div class="form-group">
        <label for="name">Student Name: <sup>*</sup></label>
        <input type="text" name="name" class="form-control form-control-md <?php echo (!empty($data['name_err'])) ?'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
      </div>

      <div class="form-group">
        <label for="supervisor">Supervisor Name: <sup>*</sup></label>
        <input type="text" name="supervisor" class="form-control form-control-md <?php echo (!empty($data['supervisor_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['supervisor']; ?>">
        <span class="invalid-feedback"><?php echo $data['supervisor_err']; ?></span>
      </div>

      <div class="form-group">
        <label for="school">School: <sup>*</sup></label>
        <input type="text" name="school" class="form-control form-control-md <?php echo (!empty($data['school_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['school']; ?>">
        <span class="invalid-feedback"><?php echo $data['school_err']; ?></span>
      </div>
      
      <div class="form-group">
        <label for="course">Course: <sup>*</sup></label>
        <input type="text" name="course" class="form-control form-control-md <?php echo (!empty($data['course_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['course']; ?>">
        <span class="invalid-feedback"><?php echo $data['course_err']; ?></span>
      </div>

      <div class="form-group">
        <label for="project_title">Project Title: <sup>*</sup></label>
        <textarea name="project_title" class="form-control form-control-md <?php echo (!empty($data['project_title_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['project_title']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['project_title_err']; ?></span>
      </div>

      <div class="form-group">
        <label for="lay_summary">Lay Summary: <sup>*</sup></label>
        <textarea name="lay_summary" class="form-control form-control-md <?php echo (!empty($data['lay_summary_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['lay_summary']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['lay_summary_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>
<?php 
  $this->layoutPath = "layoutview.php";
?>
<h1 class="my-3 ms-2">Update task: <?php echo $task->name; ?></h1>

<form method="post" action="index.php?controller=Home&action=updatePost&id=<?php echo $task->id; ?>">
    <div class="row">
        <div class="col-md-7">
          <label>Name of task:</label>
            <input type="text" name="name" class="form-control" value="<?php echo $task->name; ?>">
        </div>

        <div class="col-md-2">
            <label>Priority:</label>
            <select class="form-select" name="priority" aria-label="Default select example">
              <option value="1" <?php if($task->priority == 1) echo 'selected'; ?>>Low</option>
              <option value="2" <?php if($task->priority == 2) echo 'selected'; ?>>Medium</option>
              <option value="3" <?php if($task->priority == 3) echo 'selected'; ?>>High</option>
            </select>
        </div>

    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label>Finish time:</label>
            <input type="timestamp" class="form-control" name="finish_time" value="<?php echo $task->finish_time; ?>">
        </div>
        <div class="col-md-4">
            <label>Project:</label>
            <select class="form-select" name="project_id" aria-label="Default select example">
              <?php foreach($project as $x): ?>
                  <option value="<?php echo $x->id; ?>" <?php if($task->project_id == $x->id) echo 'selected'; ?>>
                      <?php echo $x->name; ?>
                  </option>
              <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="row mt-3 ms-2">
        <div class="col-md-4 form-check form-switch">
          <input class="form-check-input" type="checkbox" name="status" value="1" <?php if($task->status==1) echo 'checked'; ?>>
          <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
        </div>
    </div>

    <div class="row my-2">
        <div class="col-md-6 mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" type="button" class="btn btn-primary ms-3">Cancel</a>
        </div>
    </div>  
</form> 
<?php 
  $this->layoutPath = "layoutview.php";
?>
<link rel="stylesheet" type="text/css" href="assets/client/css/project.css">
<link rel="stylesheet" type="text/css" href="assets/client/css/tasklist.css">

<div class="row my-4">
    <div class="col-md-6 input-group-lg">
        <input type="text" class="form-control input_project_name" name="project_name" value="<?php echo $project->name; ?>" placeholder="Enter name of project" required>
    </div>
    <div class="col-md-6">
        <a href="index.php?controller=home&action=update&id=<?php echo $rows->id; ?>" class="btn_update_delete"><i class="fas fa-edit"></i></a>&ensp;
        <a href="index.php?controller=home&action=delete&id=<?php echo $rows->id; ?>" class="btn_update_delete"><i class="fas fa-trash"></i></a>    
    </div>
</div>

<ul id="today_vue3" class="list-group list-group-flush">
    <?php foreach($worklist as $rows): ?>
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="" <?php if($rows->status==1) echo 'checked'; ?>>
                    <label class="form-check-label ed_label" for="flexCheckDefault">
                        <?php echo $rows->name; ?>     
                    </label>
                </div>
            </div>
            <div class="col-md-7 text-end">
                <a href="index.php?controller=home&action=update&id=<?php echo $rows->id; ?>" class="btn_update_delete"><i class="fas fa-edit"></i></a>&ensp;
                <a href="index.php?controller=home&action=delete&id=<?php echo $rows->id; ?>" class="btn_update_delete"><i class="fas fa-trash"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
              <span>
                  <?php if($rows->priority == 1): ?>
                    <span class="badge rounded-pill bg-success">Low</span>&ensp;&ensp;
                  <?php elseif($rows->priority == 2): ?>
                    <span class="badge rounded-pill bg-warning text-dark">Medium</span>
                  <?php elseif($rows->priority == 3): ?>
                    <span class="badge rounded-pill bg-danger">High</span> &ensp;&ensp;
                  <?php endif;?>
              </span>&ensp;&ensp;
              <span class="ed_label"><i class="far fa-calendar-alt my_icon"></i> <?php echo date("m/d/y H:i", strtotime($rows->finish_time)); ?></span>
            </div>   
        </div>
    </li>
    <?php endforeach;?>
</ul>

<div id="project_vue_add">
    <form method="post" action="index.php?controller=Home&action=addTask">
    <ul class="list-group list-group-flush mt-5">
        <li class="list-group-item" v-for="item in count" v-bind:key="item.id">
            <comp-add-task1></comp-add-task1>
        </li>  
    </ul>
    <div class="row my-3">
        <div class="col-md-5">
            <comp-btn-add v-on:click.native="count ++"></comp-btn-add>
        </div>
        <div class="col-md-6 text-end">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>  
    </form>
</div>

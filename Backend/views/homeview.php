<?php 
  $this->layoutPath = "layoutview.php";
?>
<link rel="stylesheet" type="text/css" href="assets/client/css/home.css">
<link rel="stylesheet" type="text/css" href="assets/client/css/tasklist.css">
<h1 class="my-3 ms-2">Today</h1>

<form action="index.php?controller=Home&action=updateStatus" method="post">
    <ul id="today_vue" class="list-group list-group-flush">
        <?php foreach($worklist as $rows): ?>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-check">
                        <comp-check-status <?php if($rows->status==1) echo 'checked'; ?> value="<?php echo $rows->id; ?>">
                        </comp-check-status>
                        <label :class="['form-check-label', 'ed_label']" for="flexCheckDefault">
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
                                <span class="badge rounded-pill bg-success me-4">Low</span>
                            <?php elseif($rows->priority == 2): ?>
                                <span class="badge rounded-pill bg-warning text-dark me-4">Medium</span>
                            <?php elseif($rows->priority == 3): ?>
                                <span class="badge rounded-pill bg-danger me-4">High</span>
                            <?php endif;?>
                        </span> 
                        <?php
                            $finish_time1 = date("Y-m-d H:i:s"); 
                            $finish_time = date("Y-m-d H:i:s", strtotime($rows->finish_time)); 
                            if($finish_time1 > $finish_time) { 
                            // echo date_diff($finish_time1, $finish_time)->format('%R%h hour');
                                echo "<span class='ed_label me-4' style='text-decoration: line-through;'><i class='fas fa-clock my_icon'></i> :";
                                echo date("H:i", strtotime($rows->finish_time));
                                echo "</span>";
                            } else {
                                echo "<span class='ed_label me-4'><i class='fas fa-clock my_icon'></i> :";
                                echo date("H:i", strtotime($rows->finish_time));
                                echo "</span>";
                            }
                        ?>
                       <?php 
                           $project_name = $this->modelGetprojectName($rows->project_id); 
                       ?>
                       <span class="ed_label"><i class="fas fa-clipboard-list my_icon"></i> : <?php echo $project_name ->name; ?></span>
                </div>
            </div>
        </li>
        <?php endforeach;?>
        <li class="list-group-item">
            <div class="col text-end">
                <button type="submit" class="btn btn-primary">Update status</button>
            </div>
        </li>
    </ul>
</form>

<div id="today_vue_add">
    <form method="post" action="index.php?controller=Home&action=addTask">
    <ul class="list-group list-group-flush mt-5">
        <li class="list-group-item" v-for="item in count" v-bind:key="item.id">
            <comp-add-task></comp-add-task>
            <div class="col-md-4">
                <label>Project:</label>
                <select class="form-select" name="task[project][]" aria-label="Default select example">
                  <option value="" selected></option>
                  <?php foreach($project as $x): ?>
                      <option value="<?php echo $x->id; ?>">
                          <?php echo $x->name; ?>
                      </option>
                  <?php endforeach; ?>
                </select>
            </div> 
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

<link rel="stylesheet" type="text/css" href="assets/client/css/sidebar.css">

<div class="list-group sidebar_list">
  <a href="index.php" class="list-group-item list-group-item-action sidebar_item">
    Notification &ensp;&ensp;<span class="badge rounded-pill bg-danger">10</span>
  </a>
  <a href="index.php" class="list-group-item list-group-item-action sidebar_item">
    Today
  </a>
  <a href="#" class="list-group-item list-group-item-action sidebar_item">Next week</a>
  <a href="#" class="list-group-item list-group-item-action sidebar_item">Next month</a>
  <div id="project_list">
  <a class="list-group-item list-group-item-action sidebar_item" v-on:click="isActive = !isActive"><i class="fas fa-chevron-down sidebar_icon"></i> Projects</a>  
      <template v-if="isActive">
          <?php
              $conn = Connection::getInstance();
              $query = $conn->query("select * from projects order by id");
              $project_list = $query->fetchAll();
          ?>
          <?php foreach($project_list as $rows): ?>
              <transition name="fade">
                  <a href="index.php?controller=Project&id=<?php echo $rows->id; ?>" class="list-group-item list-group-item-action ps-5 sidebar_item">
                      <?php echo $rows->name; ?>
                  </a>
              </transition>
          <?php endforeach; ?>
      </template>
  </div>
  <a href="index.php?controller=AddProject" class="list-group-item list-group-item-action sidebar_item"><i class="fas fa-plus sidebar_icon"></i> Add project</a>
</div>
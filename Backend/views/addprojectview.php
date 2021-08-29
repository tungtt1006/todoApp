<?php 
  $this->layoutPath = "layoutview.php";
?>
<link rel="stylesheet" type="text/css" href="assets/client/css/addproject.css">
<h1 class="mt-3 ms-2">Add project</h1>

<form method="post" action="index.php?controller=AddProject&action=addTask">
    <ul class="list-group list-group-flush" id="tasklist">
        <div class="row my-3 mx-2">
            <div class="col input-group-lg">
                <input type="text" class="form-control" name="project_name" placeholder="Enter name of project" required="">
            </div>
        </div>
        <li class="list-group-item py-4" v-for="item in count" v-bind:key="item.id">
            <comp-add-task1></comp-add-task1>
        </li>

        <div class="row my-3">
            <div class="col-md-6">
                <comp-btn-add v-on:click.native="count ++"></comp-btn-add>
            </div>
            <div class="col-md-6 text-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>  
    </ul>
</form> 

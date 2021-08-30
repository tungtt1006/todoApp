<template>
<div>
    <h1 class="my-3 ms-2">Update task</h1>
    <div class="row">
        <div class="col-md-6">
            <label>Name of task:</label>
            <input type="text" class="form-control" v-model="task.name">
        </div>
        <div class="col-md-2">
            <label>Priority:</label>
            <select class="form-select" v-model="task.priority">
                <option value="1" selected>Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
            </select>
        </div>

        <div class="col-md-4">
            <label>Finish time:</label>
            <input type="datetime-local" class="form-control" v-model="task.finish_time">
        </div>
        </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <label>Project:</label>
            <select class="form-select" v-model="task.project_id">
              <option value="" selected></option>
              <option v-for="project in projects" :key="project.id" :value="project.id">
                  {{ project.name }}
              </option>
            </select>
        </div> 
    </div>
    <div class="row my-3">
        <div class="col-md-11 text-end">
            <button type="button" class="btn btn-primary" @click="updateTask()">Update</button>
        </div>
    </div>    
</div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['task_update_id'],
    data: function () {
        return {
            projects: [],
            task: {}
        }
    },
    mounted () {
        axios
          .get('http://localhost/TodoApp/backend/api/projects/getallproject.php')
          .then(response => {this.projects = response.data});
        axios
          .get('http://localhost/TodoApp/backend/api/tasklist/getatask.php?id='+this.task_update_id)
          .then(response => {this.task = response.data});
    },
    methods: {
        updateTask: function () {
            axios
              .put('http://localhost/TodoApp/backend/api/tasklist/updatetask.php?id='+this.task.id, {
                name: this.task.name,
                priority: this.task.priority,
                project_id: this.task.project_id,
                finish_time: this.task.finish_time
            })   
        }
    },
}
</script>

<style>

</style>

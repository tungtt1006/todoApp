<template>
<div>
    <div class="row">
        <div class="col-md-6">
            <label>Name of task:</label>
            <input type="text" class="form-control" v-model="name">
        </div>
        <div class="col-md-2">
            <label>Priority:</label>
            <select class="form-select" v-model="priority">
                <option value="1" selected>Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
            </select>
        </div>

        <div class="col-md-3" v-if="projectAcitve != 1">
            <label>Finish time:</label>
            <input type="time" class="form-control" v-model="finish_time">
        </div>
        <div class="col-md-4" v-else>
            <label>Finish time:</label>
            <input type="datetime-local" class="form-control" v-model="finish_time">
        </div>
    </div>
    <div class="row"  v-if="projectAcitve != 1">
        <div class="col-md-4">
            <label>Project:</label>
            <select class="form-select" v-model="project_id">
              <option value="" selected></option>
              <option v-for="project in projects" :key="project.id" :value="project.id">
                  {{ project.name }}
              </option>
            </select>
        </div> 
    </div>
    <div class="row my-3">
        <div class="col-md-11 text-end">
            <button type="button" class="btn btn-primary" @click="addTask()">Add task</button>
        </div>
    </div>   
</div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['projectAcitve', 'project_name'],
    data: function () {
        return {
            projects: [],
            name: '', 
            priority: '',
            finish_time: '',
            project_id: 0,
            test: {},
        }
    },
    mounted () {
        if(this.projectAcitve != 1) {
            axios
              .get('http://localhost/TodoApp/backend/api/projects/getallproject.php')
              .then(response => {this.projects = response.data});
        }
    },
    methods: {
        addTask: function () {
            if(this.projectAcitve == 1) {
                axios
                  .post('http://localhost/TodoApp/backend/api/projects/createproject.php', {
                    name: this.project_name, 
                  })
                  .then(response => {this.test = response.data});          
            }
            
            axios
                .post('http://localhost/TodoApp/backend/api/tasklist/create.php', {
                    name: this.name, 
                    priority: this.priority,
                    finish_time: this.finish_time,
                    project_id: this.project_id  
                });

            this.$emit('render_again');
            if(this.projectAcitve == 1) {
                this.$emit('createProject');
            }

            this.name = ''; 
            this.priority = '';
            this.finish_time = '';
            this.project_id = '';
        }
    }
}
</script>

<style>

</style>

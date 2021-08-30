<template>
    <div>
        <div class="row my-4 ms-2">
            <div class="col-md-7">
                <input @keyup.enter="updateProject()" type="text" class="input_project"    v-model="project.name">
            </div>
            <div class="col-md-1 pt-3">
                <span @click="deleteProject()" class="btn_update_delete">
                    <i class="fas fa-trash"></i>
                </span>
            </div>
        </div>

        <ul class="list-group list-group-flush">
            <Task v-for="task in tasks" 
                  :key="task.id"
                  :taskData="task" 
                  @render_again="rerender"
                  @taskSelectcontent="moveToupdate1"
            />
        </ul>
        <div class="row mt-5">
            <h3>Add task in project:</h3>
            <Task_input @render_again="rerender" />
        </div>
    </div>  
</template>

<script>
import Task from './Task.vue';
import axios from 'axios';
import Task_input from './Task_input.vue';

export default {
    props: ['project_detail_id'],
    data: function () {
        return {
            tasks: [],
            project: {}  
        }
    },
    mounted() {
        this.loadData();
        this.loadData1();


    },
    components: {
        Task,
        Task_input
    }, 
    methods: {
        loadData: function () {
            axios
              .get('http://localhost/TodoApp/backend/api/projects/getprojectname.php?project_id='+this.project_detail_id)
              .then(response => {this.project = response.data});
            this.$forceUpdate();

        },
        loadData1: function () {
            axios
              .get('http://localhost/TodoApp/backend/api/tasklist/readwprojectid.php?project_id='+this.project_detail_id)
              .then(response => {this.tasks = response.data});
            this.$forceUpdate();
        },
        rerender: function () {
            this.loadData1()
        },
        moveToupdate1: function (taskUpdate) {
            this.$emit('taskSelectcontent1', taskUpdate);
        },
        updateProject: function () {
            axios
              .put('http://localhost/TodoApp/backend/api/projects/updateproject.php?id='+this.project.id, {
                  name: this.project.name
            });
            alert("Updated successfully");
            this.$emit('reload_menu');
        },
        deleteProject: function () {
            axios
              .delete('http://localhost/TodoApp/backend/api/projects/deleteproject.php?id='+this.project_detail_id);
            this.$emit('reload_menu');
        }
    },
    watch: {
        project_detail_id: function () {
            this.loadData();
            this.loadData1();
        }    
    }
}
</script>

<style scoped>
.input_project {
    border: none;
    border-bottom: 1px solid black;
    font-size: 30px;
}
.input_project:focus {
    outline: none;
}
.btn_update_delete {
    font-size: 20px;
}
</style>

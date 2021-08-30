<template>
    <div>
        <h1 class="my-3 ms-2">Today</h1>

        <ul class="list-group list-group-flush">
            <Task v-for="task in tasks" 
                  :key="task.id"
                  :taskData="task" 
                  @render_again="rerender"
                  @taskSelectcontent="moveToupdate1"
            />
        </ul>
        <div class="row mt-5">
            <h3>Add task today:</h3>
            <Task_input @render_again="rerender" />
        </div>
    </div>  
</template>

<script>
import Task from './Task.vue';
import axios from 'axios';
import Task_input from './Task_input.vue';

export default {
    data: function () {
        return {
            tasks: []  
        }
    },
    mounted() {
        axios
          .get('http://localhost/TodoApp/backend/api/tasklist/read.php')
          .then(response => {this.tasks = response.data});
    },
    components: {
        Task,
        Task_input
    }, 
    methods: {
        rerender: function () {
            axios
                .get('http://localhost/TodoApp/backend/api/tasklist/read.php')
                .then(response => {this.tasks = response.data});
        },
        moveToupdate1: function (taskUpdate) {
            this.$emit('taskSelectcontent1', taskUpdate);
        }
    }
}
</script>

<style>

</style>

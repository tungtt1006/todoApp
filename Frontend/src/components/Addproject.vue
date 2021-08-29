<template>
<div>
    <h1 class="mt-3 ms-2">Add project</h1>
    <ul class="list-group list-group-flush">
        <div class="row my-3 mx-2">
            <div class="col input-group-lg">
                <input type="text" class="form-control" name="project_name" placeholder="Enter name of project" required v-model="projectName">
            </div>
        </div>
        
        <div class="row mt-3" v-if="isActive">
            <div class="col">
                <Task v-for="task in tasks" 
                  :key="task.id"
                  :taskData="task" 
                />
            </div>  
        </div>

        <div class="row my-3 ms-2">
            <div class="col-md-12">
                <Task_input :projectAcitve="projectAcitve"
                            :project_name="projectName"
                            @createProject="createP"
                            @reload="tttt"
                 /> 
            </div>
        </div>  
    </ul>
</div>
</template>

<script>   
import Task_input from './Task_input.vue';
import Task from './Task.vue';

export default {
    data: function () {
        return {
            projectAcitve: 1 ,
            projectName: '',
            isActive: false,
        }
    },
    components: {
        Task_input,
        Task
    }, 
    methods: {
        createP: function () {
            
            this.projectName = '';
        },
        tttt:function () {
            this.$forceUpdate();
            alert("ok");
        }
    }
}
</script>

<style>
.content_list {
  background-color: white;
}
</style>

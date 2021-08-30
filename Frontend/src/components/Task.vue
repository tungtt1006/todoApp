<template>
    <li class="list-group-item" >
        <div class="row">
            <div class="col-md-5">
                <input type="checkbox" v-model="checked">
                <label class="form-check-label ms-3 ed_label_name" :class="{ line_through: checked }">
                    {{ taskData.name }}    
                </label>
            </div>
            <div class="col-md-7 text-end">
                <span @click="moveToupdate()" class="btn_update_delete"><i class="fas fa-edit"></i></span>&ensp;
                <span @click="deleteTask()" class="btn_update_delete"><i class="fas fa-trash"></i></span>      
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-7">
                <span>
                      <span v-if="taskData.priority == 1" class="badge rounded-pill bg-success me-4">Low</span>
                      <span v-if="taskData.priority == 2" class="badge rounded-pill bg-warning text-dark me-4">Medium</span>
                      <span v-if="taskData.priority == 3" class="badge rounded-pill bg-danger me-4">High</span>
                  </span> 
                  <span class='ed_label me-4'>
                      <i class='fas fa-clock my_icon'></i> : {{ taskData.finish_time }}
                  </span>
                  <span class="ed_label">
                      <i class="fas fa-clipboard-list my_icon"></i> : {{ taskData.project_name }}
                  </span>
            </div>
        </div>
        </li> 
</template>

<script>
import axios from 'axios'

export default {
    props: ['taskData'],
    data: function () {
        return { 
            checked: false,
            taskUpdate: { displayContent: 100, task_id: 0 }   
        }
    },
    mounted() {
        if(this.taskData.status == 1){
            this.checked = true;
        }
    },
    watch: {
        checked: function () {
            axios
              .get('http://localhost/TodoApp/backend/api/tasklist/updatestatus.php?id='+(this.taskData.id));
            this.$emit('render_again');
        }
    },
    methods: {
        moveToupdate: function () {
            this.taskUpdate.task_id = this.taskData.id;
            this.$emit('taskSelectcontent', this.taskUpdate); 
        },
        deleteTask: function () {
            axios
              .delete('http://localhost/TodoApp/backend/api/tasklist/deletetask.php?id='+this.taskData.id);
            this.$emit('render_again');
        }
    }
}
</script>

<style>
.ed_label_name {
   font-size: 20px;
}
.ed_label {
    font-weight: 500;
}
.line_through {
    text-decoration: line-through;
}
.btn_update_delete {
    font-size: 20px;
}
</style>

<template>
    <li class="list-group-item sidebar_item" v-on:mousedown="test1()">
        <div v-if="menu_item_data.index == 4">
            <i class="fas fa-chevron-down chervon"></i>&ensp;{{ menu_item_data.name }}
                <br>
                <div v-show="isActive">
                    <li class="list-group-item sidebar_item sidebar_item_1" v-for="project in projects" :key="project.id" v-on:mousedown.stop="moveToproject(project.id)">
                        {{ project.name }}
                    </li>
                </div>
        </div>
        <div v-else-if="menu_item_data.index == 5">
            <i class="fas fa-plus"></i> {{ menu_item_data.name }}
        </div>
        <div v-else>
            {{ menu_item_data.name }}
        </div>
    </li>
</template>

<script>
import axios from 'axios';

export default {
    props: ['menu_item_data', 'reload_menu_item'],
    data: function () {
        return {
            projects: [],
            isActive: false,
            projectDetail: { displayContent: 101, project_id: 0 }
        }
    },
    mounted() {
        if(this.menu_item_data.index == 4) {
            axios
               .get('http://localhost/TodoApp/api/projects/getallproject.php')
               .then(response => {this.projects = response.data});
        }
    },
    methods: {
        test1: function () {
            this.isActive = !this.isActive;
        },
        moveToproject: function (project_id) {
            this.projectDetail.project_id = project_id;
            this.$emit('moveToproject', this.projectDetail);
        },
        reloadPage: function () {
            axios
               .get('http://localhost/TodoApp/api/projects/getallproject.php')
               .then(response => {this.projects = response.data});
        }
    },
    watch: {
       reload_menu_item: function () {
           if(this.menu_item_data.index == 4) {
               this.reloadPage();
           }  
       }
    }
}
</script>

<style scoped>
.sidebar_item
{
    border: none;
    background-color: #F5F8FD;
}
.sidebar_item_1 {
    padding: 0px 0px 0px 10px;
    font-size: 18px;
}
.chervon
{
    font-size: 15px;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>

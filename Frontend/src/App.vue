<template>
  <div id="app">
      <Header />
      <div class="container my-4">
          <div class="row">
              <div class="col-md-3">
                  <Menu @menu_selected="menuSelectcontent"
                        @moveToproject1="moveToproject2"
                        :reload_menu1="menu"
                  />
              </div>
              <div class="col-md-9 mb-5 content_list">
                  <Task_list v-if="0 == displayContent" 
                             @taskSelectcontent1="moveToupdate2" 
                  />
                  <Today 
                      v-else-if="1 == displayContent" 
                      @taskSelectcontent1="moveToupdate2" 
                  />
                  <h1 v-else-if="2 == displayContent">Hello World 2</h1>
                  <h1 v-else-if="3 == displayContent">Hello World 3</h1>
                  <Addproject v-else-if="5 == displayContent" />
                  <Task_update v-else-if="100 == displayContent"
                              :task_update_id="updateTaskId"
                  />
                  <Project_detail v-else-if="101 == displayContent" 
                                  :project_detail_id="projectDetailId"
                                  @taskSelectcontent1="moveToupdate2"
                                  @reload_menu="reloadMenu"
                  />
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import Menu from './components/Menu.vue';
import Header from './components/Header.vue';
import Today from './components/Today.vue';
import Task_update from './components/Task_update.vue';
import Addproject from './components/Addproject.vue';
import Project_detail from './components/Project_detail.vue';
import Task_list from './components/Task_list.vue';

export default {
  name: 'App',
  data() {
      return {
          displayContent: 1,
          updateTaskId: 0,
          projectDetailId: 0,
          menu: 1,
      }
  },
  components: {
      Menu,
      Header,
      Today,
      Task_update,
      Addproject,
      Project_detail,
      Task_list,
  },
  methods: {
      menuSelectcontent: function (index) {
          this.displayContent = index;
      },
      moveToupdate2: function (taskUpdate) {
          this.displayContent = taskUpdate.displayContent;
          this.updateTaskId = taskUpdate.task_id;
      },
      moveToproject2: function (projectDetail) {
          this.displayContent = projectDetail.displayContent;
          this.projectDetailId = projectDetail.project_id;
          this.$forceUpdate();
      },
      reloadMenu: function () {
          this.menu += 1;
      }
  }
}
</script>

<style>
.content_list {
  background-color: white;
}
</style>

var project_list = new Vue({
    el : "#project_list",
    data : {
        isActive: false
    }
});


Vue.component('comp-check-status', {
    template: `
       <input class="form-check-input" type="checkbox" name="status[]">
    `     
});
var today_vue = new Vue({
    el: '#today_vue',
    data: {
        isActive: false,
        count: 0,
        k : 0
    },
    methods: {
        hello(text, e) {
            e.target.value = e.target.checked,
            console.log(e.target.value),
            this.count = text
        }
    }
});

Vue.component('comp-add-task', {
    template: `
        <div class="row">
            <div class="col-md-6">
                <label>Name of task:</label>
                <input type="text" name="task[name][]" class="form-control">
            </div>

            <div class="col-md-2">
                <label>Priority:</label>
                <select class="form-select" name="task[priority][]" aria-label="Default select example">
                  <option value="1" selected>Low</option>
                  <option value="2">Medium</option>
                  <option value="3">High</option>
                </select>
            </div>

            <div class="col-md-3">
                <label>Finish time:</label>
                <input type="time" class="form-control" name="task[finish_time][]">
            </div>
        </div>
    `
});
Vue.component('comp-btn-add', {
    data: function () {
        return {
          count: 0
       }
    },
    template: `     
            <a type="button" class="ms-3 add_task">
                <i class="fas fa-plus sidebar_icon"></i> Add task
            </a>
        `
});
var today_vue_add = new Vue({
    el: '#today_vue_add',
    data: function () {
        return {
          count: 1
        }
    }
});

Vue.component('comp-add-task1', {
    template: `  
        <div>   
            <div class="row">
                <div class="col-md-7">
                    <label>Name of task:</label>
                    <input type="text" name="task[name][]" class="form-control">
                </div>

                <div class="col-md-2">
                    <label>Priority:</label>
                    <select class="form-select" name="task[priority][]" aria-label="Default select example">
                      <option value="1" selected>Low</option>
                      <option value="2">Medium</option>
                      <option value="3">High</option>
                    </select>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <label>Finish time:</label>
                    <input type="datetime-local" class="form-control" name="task[finish_time][]">
                </div>
            </div>
        </div>
        `
});
var tasklist = new Vue({
    el: '#tasklist',
    data: function () {
        return {
            count: 1
        }
    }
});
var project_vue_add = new Vue({
    el: '#project_vue_add',
    data: function () {
        return {
          count: 1
        }
    }
});
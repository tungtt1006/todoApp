<template>
    <ul class="list-group sidebar_list">
        <Menu_item 
            v-for="(menu_item, index) in menu_items" 
            :key="menu_item.index" 
            :menu_item_data="menu_item"
            :reload_menu_item="reload_menu_item"
            @moveToproject="moveToproject1"
            @click.native="test(index)" 
        />
  </ul>
</template>

<script>
import Menu_item from './Menu_item.vue';

export default {
    props: ['reload_menu1'],
    data: function () {
        return {
            reload_menu_item: 1,
            menu_items: [
                { index: 0, name: 'Task list' }, 
                { index: 1, name: 'Today' }, 
                { index: 2, name: 'Next week' }, 
                { index: 3, name: 'Next month' }, 
                { index: 4, name: 'Projects'},
                { index: 5, name: 'Add Projects'}
            ]
        }
    },
    components: {
        Menu_item
    },
    methods: {
        test: function (index) {
            if(index != 4) {
                this.$emit('menu_selected', index);
            } else {
                this.menu_items.display = !this.menu_items.display;
            }
        },
        moveToproject1: function (projectDetail) {
            this.$emit('moveToproject1', projectDetail);
        }
    },
    watch: {
       reload_menu1: function () {
            this.reload_menu_item += 1; 
       }
    }
}
</script>

<style>
.sidebar_list
{
    font-weight: 600;
    font-size: 20px;
}
</style>

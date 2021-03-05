import Vue from "vue";
import VueRouter from 'vue-router';
import AuthIndexComponent from './components/Auth/IndexComponent';
import NewTodoistComponent from './components/Todoist/NewTodoistComponent';
import TodoistIndexComponent from './components/Todoist/IndexComponent';
import TodoistComponent from './components/Todoist/TodoistComponent';

import store from "./store";

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'Auth',
        component: AuthIndexComponent,
        meta: {
            requireVisitor: true,
        }
    },
    {
        path: '/todoist',
        name: 'Todoist',
        component: TodoistIndexComponent,
        meta: {
            requireAuth: true,
        }
    },
    {
        path: '/todoist/new',
        name: 'New Todoist',
        component: NewTodoistComponent,
        meta: {
            requireAuth: true,
        }
    },
    {
        path: '/todoist/:id',
        name: 'Existing Todoist',
        component: TodoistComponent,
        meta: {
            requireAuth: true,
        }
    },
    {
        path: '*',
        name:'404',
        redirect: { name: 'Todoist' }
    }
];

const router = new VueRouter({
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requireAuth)) {
        if (!store.getters.isUserLoggedIn) {
            next({
                name: 'Auth',
            });
        } else {
            next();
        }
    } else if (to.matched.some(record => record.meta.requireVisitor)) {
        if (store.getters.isUserLoggedIn) {
            next({
                name: 'Todoist',
            });
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;

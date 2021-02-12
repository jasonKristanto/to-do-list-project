import VueRouter from 'vue-router';
import TodoistIndexComponent from './components/Todoist/IndexComponent';
import AuthIndexComponent from './components/Auth/IndexComponent';
import NewTodoistComponent from './components/Todoist/NewTodoistComponent';
import TodoistComponent from './components/Todoist/TodoistComponent';

const routes = [
    {
        path: '/',
        name: 'Auth',
        component: AuthIndexComponent,
    },
    {
        path: '/todoist/',
        name: 'Todoist',
        component: TodoistIndexComponent,
    },
    {
        path: '/todoist/new/',
        name: 'New Todoist',
        component: NewTodoistComponent,
    },
    {
        path: '/todoist/1/',
        name: 'Existing Todoist',
        component: TodoistComponent,
    },
]

const router = new VueRouter({
    routes
})

export default router

import VueRouter from 'vue-router';
import TodoistIndexComponent from './components/Todoist/IndexComponent';
import AuthIndexComponent from './components/Auth/IndexComponent';

const routes = [
    {
        path: '/',
        name: 'Auth',
        component: AuthIndexComponent
    },
    {
        path: '/todoist',
        name: 'Todoist',
        component: TodoistIndexComponent
    },
]

const router = new VueRouter({
    routes
})

export default router

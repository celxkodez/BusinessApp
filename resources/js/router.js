import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './views/Home.vue';
import Signin from './views/auth/Signin';
import Signup from './views/auth/Signup';
import UsersIndex from './views/UsersIndex';
import UsersEdit from './views/UsersEdit';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/signin',
            component: Signin
        },
        {
            path: '/signup',
            component: Signup
        },
        {
            path: '/users',
            name: 'users.index',
            component: UsersIndex
        },
        {
            path: '/users/:id/edit',
            name: 'users.edit',
            component: UsersEdit
        },
        // { path: '/404', name: '404', component: NotFound },
        // { path: '*', redirect: '/404' },
    ],
    mode: 'history'
});

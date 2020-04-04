import VueRouter from 'vue-router'
import Vue from 'vue'

// Pages
import Home from './pages/Home'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'
import MyComponent from './components/MyComponent'
import RolesIndex from './pages/roles/index'
import RolesCreate from './pages/roles/create'
import RolesEdit from './pages/roles/edit'

// Routes
const routes = [{
        path: '/',
        // name: 'home',
        // component: Home,
        name: 'MyComponent',
        component: MyComponent,
        meta: {
            auth: undefined
        }
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            auth: false
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },
    // USER ROUTES
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            auth: true
        }
    },
    // ADMIN ROUTES
    {
        path: '/admin',
        name: 'admin.dashboard',
        component: AdminDashboard,
        meta: {
            auth: { roles: 2, redirect: { name: 'login' }, forbiddenRedirect: '/403' }
        }
    },

    {
        path: '/roles',
        name: 'roles.index',
        component: RolesIndex,
        meta: {
            auth: true
        }
    },

    {
        path: '/roles/store',
        name: 'roles.create',
        component: RolesCreate,
        meta: {
            auth: true
        }
    },

    {
        path: '/roles/edit/:id',
        name: 'roles.edit',
        component: RolesEdit,
        meta: {
            auth: true
        }
    },
]

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
})

export default router
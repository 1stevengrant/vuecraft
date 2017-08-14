import Detail from './views/Detail'
import Home from './views/Home'
import Profile from './views/Profile'
import New from './views/New'

export const routes = [
  { path: '/', component: Home },
  { path: '/:slug/:id', component: Detail, name: 'job', props: true },
  { path: '/profile', component: Profile, name: 'profile', props: true },
  { path: '/new', component: New, name: 'new', props: true }
]
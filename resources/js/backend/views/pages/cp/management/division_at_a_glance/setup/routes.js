import Layout from "./Layout.vue";
import All from "../All.vue";



const routes = {
    path: 'division-at-a-glance',
    component: Layout,

    children: [

        {
            path: '',
            name: "DivisionAtAGlance",
            component: All
        },

    ]
}


export default routes;

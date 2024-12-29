import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
const role = window.role.bm
const routes = {
    path: 'sohid-family',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllSohidFamily",
            component: All
        },
        {
            path: 'create',
            name: role+"CreateSohidFamily",
            component: Form
        },
    ]
}


export default routes;

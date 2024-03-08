import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'sohid-family',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllSohidFamily",
            component: All
        },
        {
            path: 'create',
            name: "CreateSohidFamily",
            component: Form
        },
    ]
}


export default routes;

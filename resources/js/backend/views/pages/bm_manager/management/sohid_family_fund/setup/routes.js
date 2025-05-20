import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'sohid-family-fund',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllSohidFamilyFund",
            component: All
        },
        {
            path: 'create',
            name: "CreateSohidFamilyFund",
            component: Form
        },
    ]
}


export default routes;

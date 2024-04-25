import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'monthly-income',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllDailyIncome",
            component: All
        },
        {
            path: 'create',
            name: "CreateDailyIncome",
            component: Form
        },
    ]
}


export default routes;

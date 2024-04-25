import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'income-expense',
    component: Layout,
    children: [
        {
            path: '',
            name: "Income&Expense",
            component: All
        },
        {
            path: 'create',
            name: "Create",
            component: Form
        },
    ]
}


export default routes;

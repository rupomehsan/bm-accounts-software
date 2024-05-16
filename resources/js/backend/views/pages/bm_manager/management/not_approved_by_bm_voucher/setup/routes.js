import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
const role = window.role.bm
const routes = {
    path: 'not-approved-by-bm-vouchers',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"NotApprovedByBmVoucher",
            component: All
        },
        {
            path: 'details',
            name: role+"NotApprovedForm",
            component: Form
        },

    ]
}


export default routes;

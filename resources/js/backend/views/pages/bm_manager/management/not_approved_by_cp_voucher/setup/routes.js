import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
const role = window.role.bm
const routes = {
    path: 'not-approved-by-cp-vouchers',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"NotApprovedByCpVoucher",
            component: All
        },

    ]
}


export default routes;

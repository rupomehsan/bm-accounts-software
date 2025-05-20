import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import DSATopshit from "../DSATopshit.vue";

const routes = {
    path: 'vouchers',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllVouchers",
            component: All
        },
        {
            path: 'create',
            name: "CreateVoucher",
            component: Form
        },
        {
            path: 'topshit/:id',
            name: "DSATopshit",
            component: DSATopshit
        },
    ]
}


export default routes;

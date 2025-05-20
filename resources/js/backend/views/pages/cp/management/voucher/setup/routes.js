import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import CpTopShit from "../TopShit.vue";

const routes = {
    path: 'vouchers',
    component: Layout,
    children: [
        {
            path: '',
            name: "CpAllVouchers",
            component: All
        },
        {
            path: 'approval',
            name: "CpCreateVoucher",
            component: Form
        },
        {
            path: 'topshit/:id',
            name: "CpTopShit",
            component: CpTopShit
        },
    ]
}


export default routes;

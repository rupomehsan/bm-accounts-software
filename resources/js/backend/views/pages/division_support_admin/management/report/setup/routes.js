import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'reports',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllVoucherReports",
            component: All
        },
       
    ]
}


export default routes;

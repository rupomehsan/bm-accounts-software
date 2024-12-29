import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'messages',
    component: Layout,
    children: [
        {
            path: '',
            name: "Messages",
            component: All
        },
       
    ]
}


export default routes;

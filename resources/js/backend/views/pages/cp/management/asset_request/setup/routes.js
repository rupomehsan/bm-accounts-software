import Layout from "./Layout.vue";
import All from "../All.vue";
import CpAssetRequestDetails from "../Details.vue";

const routes = {
    path: "asset-quotasion-request",
    component: Layout,
    children: [
        {
            path: "",
            name: "CpAllAssetRequest",
            component: All,
        },
        {
            path: "asset-quotation-details/:id",
            name: "AssetRequestDetails",
            component: CpAssetRequestDetails,
        },
    ],
};

export default routes;

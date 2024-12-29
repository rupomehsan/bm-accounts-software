export default [
    {
        name: "asset_id",
        label: "Select asset",
        type: "select",
        value: "",
        data_list: [],
    },

    {
        name: "sender_id",
        label: "Select sender",
        type: "select",
        value: "",
        data_list: [],
    },

    {
        name: "receiver_id",
        label: "Select receiver",
        type: "select",
        value: "",
        data_list: [],
    },

    {
        name: "request_date",
        label: "Enter your request date",
        type: "date",
        value: moment().format("YYYY-MM-DD"),
    },

    {
        name: "desctiption",
        label: "Enter your desctiption",
        type: "textarea",
        value: "",
    },
];

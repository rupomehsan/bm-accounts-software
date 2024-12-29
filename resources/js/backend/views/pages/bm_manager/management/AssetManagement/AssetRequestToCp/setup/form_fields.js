export default [
    {
        name: "asset_quotation_id",
        label: "Select asset quotation",
        type: "select",
        value: "",
        data_list: [],
    },

    {
        name: "title",
        label: "Enter your title",
        type: "text",
        value: "",
    },

    {
        name: "request_type",
        label: "Select request type",
        type: "select",
        value: "",
        data_list: [
            {
                label: "Remove",
                value: "remove",
            },
            {
                label: "Purchase",
                value: "purchase",
            },
        ],
    },
    {
        name: "quotation_image",
        label: "Upload quotation image",
        type: "file",
        value: "",
        multiple: false,
    },
];

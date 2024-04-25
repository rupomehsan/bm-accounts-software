export default [
    {
        name: "asset_id",
        label: "Select  asset",
        type: "select",
        value: "",
        data_list: [],
    },

    {
        name: "asset_audit_id",
        label: "Select asset audit",
        type: "select",
        value: "",
        data_list: [],
    },

    {
        name: "is_ok",
        label: "Select status",
        type: "select",
        value: "",
        data_list: [
            {
                label: "Yes",
                value: 'yes',
            },
            {
                label: "No",
                value: 'no',
            },
        ],
    },

    {
        name: "comment",
        label: "Enter your comment",
        type: "textarea",
        value: "",
    },
];

export default [
    {
        name: "cs_quotation_id",
        label: "Select cs quotation",
        type: "select",
        value: "",
        data_list: [],
    },
    {
        name: "title",
        label: " title",
        type: "text",
        value: "",
    },
    {
        name: "asset_categories_id",
        label: "select asset category",
        type: "select",
        value: "",
        data_list: [],
    },

    {
        name: "price",
        label: " price",
        type: "number",
        value: "",
    },

    {
        name: "memo_no",
        label: " memo no",
        type: "text",
        value: "",
    },

    {
        name: "memo_date",
        label: " memo date",
        type: "date",
        value: moment().format("YYYY-MM-DD"),
    },

    {
        name: "code",
        label: " code",
        type: "text",
        value: "",
    },

    {
        name: "asset_location",
        label: " asset location",
        type: "text",
        value: "",
    },

    {
        name: "asset_owner",
        label: " asset owner",
        type: "text",
        value: "",
    },

    {
        name: "owner_phone_number",
        label: " owner phone number",
        type: "text",
        value: "",
    },

    {
        name: "depreciation_type",
        label: " depreciation type",
        type: "select",
        value: "",
        data_list: [
            {
                label: "Percent",
                value: "percent",
            },
            {
                label: "Flat",
                value: "flat",
            },
        ],
    },

    {
        name: "buying_date",
        label: " buying date",
        type: "date",
        value: moment().format("YYYY-MM-DD"),
    },

    {
        name: "hand_over_date",
        label: " hand over date",
        type: "date",
        value: moment().format("YYYY-MM-DD"),
    },

    {
        name: "description",
        label: " description",
        type: "textarea",
        value: "",
    },
    {
        name: "comments",
        label: " comments",
        type: "textarea",
        value: "",
    },

    {
        name: "asset_image",
        label: "Upload asset image",
        type: "file",
        multiple: "false",
        value: "",
    },

    {
        name: "voucher_image",
        label: "Upload voucher image",
        type: "file",
        multiple: "false",
        value: "",
    },

    {
        name: "acceptance_image",
        label: "Upload acceptance image",
        type: "file",
        multiple: "false",
        value: "",
    },
    {
        name: "cs_quotaiton_image",
        label: "Upload cs quotaiton image",
        type: "file",
        multiple: "false",
        value: "",
    },

    {
        label: "select quotation product type",
        type: "select",
        value: "",
        data_list: [
            {
                label: "Single",
                value: "single",
            },
            {
                label: "Multiple",
                value: "multiple",
            },
        ],
    },
];

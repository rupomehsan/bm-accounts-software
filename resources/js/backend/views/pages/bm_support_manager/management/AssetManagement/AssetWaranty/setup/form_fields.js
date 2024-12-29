export default [
    {
        name: "asset_id",
        label: "Select asset",
        type: "select",
        value: "",
        data_list: [],
    },

    {
        name: "waranty_date",
        label: "Enter your waranty date",
        type: "date",
        value: moment().format("YYYY-MM-DD"),
    },

    {
        name: "description",
        label: "Enter your description",
        type: "textarea",
        value: "",
    },

    {
        name: "waranty_card_image",
        label: "Enter your waranty card image",
        type: "file",
        multiple: "false",
        value: "",
    },
];

export default [
    {
        name: "title",
        label: "Enter title",
        type: "text",
        value: "",
    },
    {
        name: "serial_number",
        label: "Enter your serial number",
        type: "number",
        value: "",
    },
    {
        name: "status",
        label: "Select status",
        type: "select",
        value: "",
        data_list: [
            {
                label: "Active",
                value: "active",
            },
            {
                label: "Inactive",
                value: "inactive",
            },
        ],

    },

];

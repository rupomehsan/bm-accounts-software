export default [
    {
        name: "full_name",
        label: "Enter your full name",
        type: "text",
        value: "",
    },
    {
        name: "email",
        label: "Enter your email",
        type: "email",
        value: "",
    },
    {
        name: "password",
        label: "Enter your password",
        type: "password",
        value: "",
    },
    {
        name: "phone",
        label: "Enter your phone number",
        type: "text",
        value: "",
    },
    {
        name: "uid",
        label: "Enter your user code",
        type: "text",
        value: "",
    },
    {
        name: "telegram_name",
        label: "Enter your telegram name",
        type: "text",
        value: "",
    },
    {
        name: "telegram_id",
        label: "Enter your telegram id",
        type: "text",
        value: "",
    },


    {
        name: "user_role_id",
        label: "Select role",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },
    {
        name: "status",
        label: "Select default status",
        type: "select",
        value: "",
        multiple: false,
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
    {
        name: "image",
        label: "Upload your image",
        type: "file",
        value: "",
        multiple: false,
    },
];
